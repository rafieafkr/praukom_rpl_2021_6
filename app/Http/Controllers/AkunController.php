<?php

namespace App\Http\Controllers;

use App\Models\User as Akun;
use App\Models\ViewLihatAkun;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreakunRequest;
use App\Http\Requests\UpdateakunRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Exception;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = ViewLihatAkun::orderBy('level_user', 'asc')
                              ->paginate(15)
                              ->withQueryString();
      if(request('cari')) {
        $user = ViewLihatAkun::where('email', 'LIKE', '%' . request('cari') . '%')
                        ->orderBy('level_user', 'asc')
                        ->paginate(15)
                        ->withQueryString();
      }

      return view('dashboard.hubin.leveluser.index', [
        "users" => $user,
        "level_users" => DB::table('level_user')->get()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAkunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAkunRequest $request)
    {
      // validasi pembuatan akun
        $validated = $request->validate([
          "level_user" => ['required'],
          "email" => ['required', 'email', 'max:60'],
          "password" => ['required', Password::min(8)],
          "username" => ['required', 'max:60'],
          "nama" => ['required', 'max:70'],
          "identitas" => ['required', 'max:20'],
        ]);

        // enkripsi password
        $validated['password'] = Hash::make($validated['password']);

        try {
        // execute procedure
        Akun::hydrate(DB::select('CALL procedure_tambah_akun(?, ?, ?, ?, ?, ?)', [
          $validated['level_user'],
          $validated['email'],
          $validated['password'],
          $validated['username'],
          $validated['nama'],
          $validated['identitas'],
        ]));

        } catch(\Exception) {
          // reload page apabila gagal buat akun
          return back()->withErrors('Akun gagal dibuat');
        }
      // redirect ke hubin/leveluser apabila sukses buat akun
      return redirect(route('leveluser.index'))->withSuccess('Akun berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(Akun $akun)
    {
      $user = DB::select('CALL procedure_edit_akun (?, ?)', [
        $akun->id,
        $akun->level_user
      ]);
      // dd($akun);

      return view('dashboard.hubin.leveluser.edit', [
        'user' => $user,
        'level_users' => DB::table('level_user')->get()
      ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  \App\Http\Requests\UpdateAkunRequest  $request
     * @param  \App\Models\Akun  $Akun
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAkunRequest $request, Akun $akun)
    {
        if ($request->level_user !== $akun->level_user) {
          $id_guru = DB::table('guru')->select('id_guru')->where('id_akun', '=', $akun->id)->get();
          switch ($akun->level_user) {
            case '1':
              DB::table('staff_hubin')->where('id_guru', '=', $id_guru[0]->id_guru)->delete();
              break;
            case '2':
              DB::table('kepala_program')->where('id_guru', '=', $id_guru[0]->id_guru)->delete();
              break;
            case '3':
              DB::table('wali_kelas')->where('id_guru', '=', $id_guru[0]->id_guru)->delete();
              break;
            case '4':
              DB::table('pembimbing_sekolah')->where('id_guru', '=', $id_guru[0]->id_guru)->delete();
              break;
            case '5':
              DB::table('pembimbing_perusahaan')->where('id_akun', '=', $akun->id)->delete();
              break;
            default:
              DB::table('siswa')->where('id_akun', '=', $akun->id)->delete();
              break;
          }
        }
        // validasi pembuatan akun
        $validated = $request->validate([
          "level_user" => ['required'],
          "email" => ['required', 'email', 'max:60'],
          "username" => ['required', 'max:60'],
          "nama" => ['required', 'max:70'],
          "identitas" => ['required', 'max:20'],
        ]);
        try {
        // execute procedure
          Akun::hydrate(DB::select('CALL procedure_update_akun(?, ?, ?, ?, ?, ?)', [
            $akun->id,
            $validated['level_user'],
            $validated['email'],
            $validated['username'],
            $validated['nama'],
            $validated['identitas'],
          ]));

        } catch(\Exception) {
          // reload page apabila gagal buat akun
          return back()->withErrors('Akun gagal diubah');
        }
      // redirect ke hubin/leveluser apabila sukses buat akun
      return redirect(route('leveluser.index'))->withSuccess('Akun berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Akun  $Akun
     * @return \Illuminate\Http\Response
     */

    public function destroy(Akun $akun)
    {
        try {
          Akun::destroy($akun->id);
        } catch (\Throwable $th) {
          return redirect(route('leveluser.index'))->withErrors('Akun gagal dihapus');
        }

        return back()->withSuccess('Akun berhasil dihapus');
    }
}