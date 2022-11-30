<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $pengajuan;
    public function __construct()
    {
        $this->pengajuan = new pengajuan;
    }
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */

    public function viewjoin(){

     $pengajuan = $this->pengajuan
            //get perusahaan
            ->join('siswa', 'siswa.nis', '=', 'pengajuan.nis')
            ->join('perusahaan', 'perusahaan.id_perusahaan', '=', 'pengajuan.id_perusahaan')
            //get walas
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->join('kelas as k', 'k.id_jurusan', '=', 'siswa.jurusan')
            ->join('wali_kelas', 'wali_kelas.id_walas', '=', 'k.id_walas')

            //get kaprog
            ->join('jurusan', 'jurusan.id_jurusan', '=', 'k.id_jurusan')
            ->join('kepala_program', 'kepala_program.id_kaprog', '=', 'jurusan.kepala_jurusan')
                
           //select data
            ->select('pengajuan.*', 'siswa.*','perusahaan.nama_perusahaan','kelas.*','wali_kelas.*','jurusan.*','kepala_program.*')
            ->get();
            // dd($data);

    $murid = DB::table('siswa')
            ->join('kelas', 'kelas.id_kelas', '=', 'siswa.id_kelas')
            ->join('wali_kelas', 'wali_kelas.id_walas', '=', 'kelas.id_walas')
            ->select('kelas.*', 'siswa.*','wali_kelas.*')
            ->get();
    // dd($pengajuan);

            return view('dashboard.suratpengajuan', [
                "data" => $pengajuan,
                "murid" => $murid
            ]);


    }

    public function hapus($id=null){
        // try{
            $hapus = $this->pengajuan
                            ->where('id_pengajuan',$id)
                            ->delete();
            if($hapus){
                return redirect('pengajuan');
            }
        // }catch(Exception $e){
        //     $e->getMessage();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengajuan $pengajuan)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function join(){

        $data = DB::table('suratpengajuan')
        ->join('siswa', 'siswa.nis', '=', 'suratpengajuan.nis')
        ->select('suratpengajuan.*', 'siswa.nama_siswa')
        ->get();
        // dd($data);

        return view('dashboard.suratpengajuan', ["data" => $data]);
       }
}
