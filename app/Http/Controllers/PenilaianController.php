<?php

namespace App\Http\Controllers;


use App\Models\Penilaian;
use App\Models\Nilai;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $penilaian;
    protected $nilai;
    public function __construct()
    {
        $this->penilaian = new Penilaian();
        $this->nilai = new Nilai();
    }
    public function index()
    {
        $jurusan = DB::table('jurusan')
            ->get();
        
        //get data view
        $dataview = DB::table('penilaian')
            ->join('pembimbing_perusahaan', 'pembimbing_perusahaan.nik_pp', '=', 'penilaian.nik_pp')
            ->join('nilai', 'nilai.id_penilaian', '=', 'penilaian.id_penilaian')
            ->join('kompetensi', 'kompetensi.id_kompetensi', '=', 'nilai.kompetensi')
            ->join('siswa', 'siswa.nis', '=', 'penilaian.nis')
            ->select('pembimbing_perusahaan.nama_pp', 'penilaian.*', 'siswa.nama_siswa','nilai.nilai','kompetensi.nama_kompetensi')
            ->get();

        //get data form
        $nilaisiswa = DB::table('penilaian')
            ->join('prakerin', 'prakerin.nis', '=', 'penilaian.nis')
            ->join('siswa', 'siswa.nis', '=', 'penilaian.nis')
            ->select('penilaian.*', 'prakerin.*','siswa.nama_siswa')
            ->get();
            // dd($nilaisiswa);
            return view('dashboard.modules.penilaian',compact('jurusan'),[
              'nilaisiswa'=>$nilaisiswa,
              'dataview'=>$dataview
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getKompetensi(Request $request)
    {
        $kompetensi = DB::table('kompetensi')
            ->where('id_jurusan', $request->id_jurusan)
            ->get();
        
        if (count($kompetensi) > 0) {
            return response()->json($kompetensi);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        //insert tabel nilai
        try {
          Nilai::create([
            "id_penilaian" => $request->id_penilaian,
            "kompetensi" => $request->kompetensi,
            "nilai" => $request->nilai,
          ]);
        } catch (\Exception) {
          return back()->withErrors('Input nilai gagal.');
        }
        return back()->withSucces('Nilai tersimpan.');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
        $prakerin = DB::table('prakerin')
        ->select()
        ->get();

        $jurusan = DB::table('jurusan')
        ->get();
    

        $nilaisiswa = DB::table('view_penilaian')
        ->select()
        ->get();

		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$dataview = DB::table('view_penilaian')
		->where('nama_siswa','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('dashboard.modules.penilaian',['dataview' => $dataview,
                                                'prakerin' => $prakerin,
                                                'jurusan' => $jurusan,
                                                'nilaisiswa' => $nilaisiswa]);
 
	}
  
       //UPDATE 
   public function edit($id)
   {
       $datanilai = DB::table('nilai')
                    ->join('kompetensi', 'kompetensi.id_kompetensi', '=', 'nilai.kompetensi')
                    ->select('kompetensi.nama_kompetensi', 'nilai.*')
                    ->where('id_penilaian', $id, 'nilai.*')
                    ->get();

       return view('dashboard.modules.editnilai', ['datanilai' => $datanilai]);
   }
   public function update(Request $request)
    {
        // dd($request);
      
        DB::table('nilai')
            ->where('id_penilaian','=', $request->id_penilaian)
            ->where('kompetensi','=', $request->kompetensi)
            
        ->update([
        
            // 'id_penilaian' => $request->id_penilaian,
            // 'kompetensi' => $request->input->kompetensi,
            'nilai' => $request->nilai

        ]);

        return back();
           
    } 
    //METHOD PRINT NILAI
    public function print($id)
    {
     
        $data_penilaian = DB::table('view_penilaian')
                     ->where('nis', $id)
                     ->select()
                     ->get();
                    //  dd($data_presensi);
 
        return view('dashboard.modules.laporan_penilaian', ['data_penilaian' => $data_penilaian]);
    }
   }
    
   
   
   