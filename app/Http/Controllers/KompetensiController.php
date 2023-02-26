<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use Exception;
use App\Http\Requests\UpdateKompetensiRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KompetensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ambilJurusan = (Auth::user()->guru->kepalaprogram->jurusan->id_jurusan);
        return view('kompetensi.index', [
            'ambilJurusan' => $ambilJurusan,
            'kompetensi' => Kompetensi::all()->where('id_jurusan', '=', Auth::user()->guru->kepalaprogram->jurusan->id_jurusan)
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


    public function tambahkompetensi(Request $request)
    {
        //
        try{
            $tambahKompetensi = $request->validate([
                'addmore.*.id_jurusan' => 'required',
                'addmore.*.nama_kompetensi' => 'required'
            ]);
        
            // dd($tambahKompetensi);
    
            foreach ($request->addmore as $key => $value) {
                Kompetensi::create($value);
            }
        } catch (Exception $err){ 
            return back()->with('alert', 'Kompetensi gagal ditambahkan');
        }
        return back()->with('success', 'Kompetensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kompetensi  $kompetensi
     * @return \Illuminate\Http\Response
     */
    public function show(Kompetensi $kompetensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kompetensi  $kompetensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kompetensi $kompetensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKompetensiRequest  $request
     * @param  \App\Models\Kompetensi  $kompetensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKompetensiRequest $request, Kompetensi $kompetensi)
    {
        //
    }

    public function hapuskompetensi($id_kompetensi)
    {
        $hapus = Kompetensi::where('id_kompetensi', '=', $id_kompetensi)->delete();

        if($hapus){
            return redirect('/kompetensi')->withAlert('Kompetensi berhasil dihapus');
        }
    }
}