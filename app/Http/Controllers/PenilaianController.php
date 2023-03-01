<?php

namespace App\Http\Controllers;
use App\Http\Controllers\flash;
use Illuminate\Support\Facades\Hash;
use App\Models\Penilaian;
use App\Models\Nilai;
use App\Models\Sikap;
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
    protected $sikap;
    public function __construct()
    {
        $this->penilaian = new Penilaian();
        $this->nilai = new Nilai();
        $this->sikap = new Sikap();
    }
    public function index()
    {
        $jurusan = DB::table('jurusan')
            ->get();

        $datasikap = DB::table('sikap')
        ->join('penilaian', 'penilaian.id_penilaian', '=', 'sikap.id_penilaian')
        ->join('siswa', 'siswa.nis', '=', 'penilaian.nis')
        ->select()
        ->get();
        // dd($datasikap);
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
              'dataview'=>$dataview,
              'datasikap'=>$datasikap
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getKompetensi(Request $request)
    {
        // dd($request);
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
    public function simpanKompetensi(Request $request)
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

    public function simpanSikap(Request $request)
    {
        //insert tabel nilai
        try {
          Sikap::create([
            "id_penilaian" => $request->id_penilaian,
            "disiplin_waktu" => $request->disiplin_waktu,
            "kemauan_kerja_dan_motivasi" => $request->kemauan_kerja_dan_motivasi,
            "kualitas_kerja" => $request->kualitas_kerja,
            "inisiatif_kerja" => $request->inisiatif_kerja,
            "perilaku" => $request->perilaku
          ]);
        } catch (\Exception $err) {
          return $err->getMessage();
        }
        return back()->withSucces('Nilai tersimpan.');
    }

    public function cariTableKompetensi(Request $request)
	{
		// menangkap data pencarian
        $prakerin = DB::table('prakerin')
        ->select()
        ->get();

        $jurusan = DB::table('jurusan')
        ->get();


        $datasikap = DB::table('sikap')
        ->join('penilaian', 'penilaian.id_penilaian', '=', 'sikap.id_penilaian')
        ->join('siswa', 'siswa.nis', '=', 'penilaian.nis')
        ->select()
        ->get();

        $nilaisiswa = DB::table('view_penilaian')
        ->select()
        ->get();

        if ($request->cari) {
            $cari = $request->cari;
     
            // mengambil data dari table pegawai sesuai pencarian data
            $dataview = DB::table('view_penilaian')
            ->where('nama_siswa','like',"%".$cari."%")
            ->orWhere('nis','like',"%".$cari."%")
            ->orWhere('nama_kompetensi','like',"%".$cari."%")
            ->orWhere('nama_pp','like',"%".$cari."%")
            ->paginate();
        } else {
            $dataview = [];
        }

    		// mengirim data pegawai ke view index
		return view('dashboard.modules.penilaian',['dataview' => $dataview,
                                                'prakerin' => $prakerin,
                                                'jurusan' => $jurusan,
                                                'nilaisiswa' => $nilaisiswa,
                                                'datasikap' => $datasikap]);
 
	}

    public function cariTableSikap(Request $request)
	{
		// menangkap data pencarian
        $prakerin = DB::table('prakerin')
        ->select()
        ->get();

        $dataview = DB::table('view_penilaian')
        ->select()
        ->get();

        $jurusan = DB::table('jurusan')
        ->get();

        $datasikap = DB::table('sikap')
        ->join('penilaian', 'penilaian.id_penilaian', '=', 'sikap.id_penilaian')
        ->join('siswa', 'siswa.nis', '=', 'penilaian.nis')
        ->select()
        ->get();
    

        $nilaisiswa = DB::table('view_penilaian')
        ->select()
        ->get();

		if ($request->cari2) {
            $cari2 = $request->cari2;
    
            $datasikap = DB::table('view_sikap')
            ->where('nama_siswa','like',"%".$cari2."%")
            ->orWhere('nis','like',"%".$cari2."%")
            ->paginate();
        } else {
            $datasikap = [];
        }
 
    		// mengirim data pegawai ke view index
		return view('dashboard.modules.penilaian',['dataview' => $dataview,
                                                'prakerin' => $prakerin,
                                                'jurusan' => $jurusan,
                                                'nilaisiswa' => $nilaisiswa,
                                                'datasikap' => $datasikap
                                               ]);
 
	}


    
  
       //UPDATE 
   public function editKompetensi($id)
   {
       $datanilai = DB::table('nilai')
                    ->join('kompetensi', 'kompetensi.id_kompetensi', '=', 'nilai.kompetensi')
                    ->select('kompetensi.nama_kompetensi', 'nilai.*')
                    ->where('id_penilaian', $id, 'nilai.*')
                    ->get();

       return view('dashboard.modules.editnilai', ['datanilai' => $datanilai]);
   }

   public function editSikap($id)
   {
       $datasikap = DB::table('sikap')
                    ->where('id_penilaian', $id, 'sikap.*')
                    ->get();

       return view('dashboard.modules.editsikap', ['datasikap' => $datasikap]);
   }
   public function updateKompetensi(Request $request)
    {
        // dd($request);
        
        DB::table('nilai')
            ->where('id_penilaian','=', $request->id_penilaian)
            ->where('kompetensi','=', $request->kompetensi)
            
        ->update([
        
            // 'id_penilaian' => $request->id_penilaian,
            // 'kompetensi' => $request->input->kompetensi,
            'nilai' => $request->nilai,

        ]);


        return redirect('penilaian');
           
    } 

    public function updateSikap(Request $request)
    {
        // dd($request);

        DB::table('sikap')
        ->where('id_penilaian','=', $request->id_penilaian)
        
        ->update([
    
        // 'id_penilaian' => $request->id_penilaian,
        "disiplin_waktu" => $request->disiplin_waktu,
        "kemauan_kerja_dan_motivasi" => $request->kemauan_kerja_dan_motivasi,
        "kualitas_kerja" => $request->kualitas_kerja,
        "inisiatif_kerja" => $request->inisiatif_kerja,
        "perilaku" => $request->perilaku

    ]);

        return redirect('penilaian');
           
    } 
    //METHOD PRINT NILAI
    public function print($id)
    {
                    
        $data_penilaian = DB::table('view_penilaian')
                     ->where('id_penilaian', $id)
                     ->select()
                     ->get();

        $data_sikap = DB::table('view_sikap')
                     ->where('id_penilaian', $id)
                     ->select()
                     ->get();
                    //  dd($data_presensi);
 
        return view('dashboard.modules.laporan_penilaian', ['data_penilaian' => $data_penilaian,
                                                            'data_sikap' => $data_sikap]);
    }

   
   }
    
   
   
   