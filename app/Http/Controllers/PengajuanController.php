<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;

class PengajuanController extends Controller
{
    private $kaprog;
    private $walas;
    private $staff_hubin;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->kaprog = DB::table('kepala_program')
                        ->join('guru', 'kepala_program.id_guru', '=', 'guru.id_guru')
                        ->select('kepala_program.id_kaprog', 'guru.nama_guru')
                        ->get();

      $this->walas = DB::table('wali_kelas')
                      ->join('guru', 'wali_kelas.id_guru', '=', 'guru.id_guru')
                      ->select('wali_kelas.id_walas', 'guru.nama_guru')
                      ->get();

      $this->staff_hubin = DB::table('staff_hubin')
                            ->join('guru', 'staff_hubin.id_guru', '=', 'guru.id_guru')
                            ->select('staff_hubin.id_staff', 'guru.nama_guru')
                            ->get();
    }
    
    public function index()
    {                       
      $pengajuan = DB::table('pengajuan')
                    ->join('perusahaan', 'pengajuan.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                    ->select('pengajuan.id_pengajuan', 'pengajuan.nis', 'perusahaan.nama_perusahaan', 'pengajuan.status_pengajuan', 'pengajuan.bukti_terima')
                    ->get();
                    
      return view('dashboard.siswa.pengajuan.index', [
        'pengajuans' => $pengajuan,
        'kaprogs' => $this->kaprog,
        'walass' => $this->walas,
        'staff_hubins' => $this->staff_hubin
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
     * @param  \App\Http\Requests\StorePengajuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePengajuanRequest $request)
    {
        // validasi pengisisan pengajuan
        $validated = $request->validate([
          "nis" => ['required', 'max:15'],
          "perusahaan" => ['required', 'max:60'],
          "alamat_perusahaan" => ['required', 'max:60'],
          "telepon_perusahaan" => ['max:60'],
          "kaprog" => ['required', 'max:4'],
          "walas" => ['required', 'max:4'],
          "staff_hubin" => ['required', 'max:4'],
          "bukti_terima" => ['image', 'file', 'max:1024']
        ]);

        // upload file ke storage
        if($request->file('bukti_terima')) {
          $validated['bukti_terima'] = $request->file('bukti_terima')->store('bukti_terima');
        } else {
          $validated['bukti_terima'] = null;
        }

        try {
        // execute procedure
        DB::select('CALL procedure_tambah_pengajuan(?, ?, ?, ?, ?, ?, ?, ?)', [
          $validated['nis'],
          $validated['perusahaan'],
          $validated['alamat_perusahaan'],
          $validated['telepon_perusahaan'],
          $validated['kaprog'],
          $validated['walas'],
          $validated['staff_hubin'],
          $validated['bukti_terima']
        ]);

        } catch(Exception) {
          // reload page apabila gagal kirim pengajuan
          return back()->withErrors('Pengajuan gagal dikirim');
        }
      // redirect ke siswa/pengajuan apabila sukses kirim pengajuan
      return redirect(route('pengajuan.index'))->withSuccess('Pengajuan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
      $getPengajuan = DB::table('pengajuan')
                    ->join('perusahaan', 'pengajuan.id_perusahaan', '=', 'perusahaan.id_perusahaan')
                    ->leftJoin('kontak_perusahaan', 'perusahaan.id_perusahaan', '=', 'kontak_perusahaan.id_perusahaan')
                    ->select('pengajuan.*', 'perusahaan.*', 'kontak_perusahaan.*')
                    ->where('id_pengajuan', '=', $pengajuan->id_pengajuan)
                    ->get();

        return view('dashboard.siswa.pengajuan.edit', [
          'pengajuan' => $getPengajuan,
          'kaprogs' => $this->kaprog,
          'walass' => $this->walas,
          'staff_hubins' => $this->staff_hubin
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengajuanRequest  $request
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePengajuanRequest $request, Pengajuan $pengajuan)
    {
      // validasi pengisisan pengajuan
      $validated = $request->validate([
        "nis" => ['required', 'max:15'],
        "perusahaan" => ['required', 'max:60'],
        "alamat_perusahaan" => ['required', 'max:60'],
        "telepon_perusahaan" => ['max:60'],
        "kaprog" => ['required', 'max:4'],
        "walas" => ['required', 'max:4'],
        "staff_hubin" => ['required', 'max:4'],
        "bukti_terima" => ['image', 'file', 'max:1024']
      ]);
      
      // jika ada gambar baru, hapus gambar lama. Jika tidak ada gambar baru, pakai gambar lama
      if($request->file('bukti_terima')) {
        if($pengajuan->bukti_terima) {
          Storage::delete($pengajuan->bukti_terima);
        }
        $validated['bukti_terima'] = $request->file('bukti_terima')->store('bukti_terima');
      } else {
        $validated['bukti_terima'] = $pengajuan->bukti_terima;
      }
      
      try {
      // execute procedure
      DB::select('CALL procedure_update_pengajuan(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
        $pengajuan->id_pengajuan,
        $pengajuan->id_perusahaan,
        $validated['nis'],
        $validated['perusahaan'],
        $validated['alamat_perusahaan'],
        $validated['telepon_perusahaan'],
        $validated['kaprog'],
        $validated['walas'],
        $validated['staff_hubin'],
        $validated['bukti_terima'],
      ]);

      } catch(Exception) {
        // reload page apabila gagal kirim pengajuan
        return back()->withErrors('Pengajuan gagal diubah');
      }
      // redirect ke siswa/pengajuan apabila sukses ubah pengajuan
      return redirect(route('pengajuan.index'))->withSuccess('Pengajuan ke '.$validated['perusahaan'].' berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
      if ($pengajuan->bukti_terima) {
        Storage::delete($pengajuan->bukti_terima);
      }
      Pengajuan::destroy($pengajuan->id_pengajuan);
      
      return redirect(route('pengajuan.index'))->withSuccess('Pengajuan berhasil dihapus');
    }
}