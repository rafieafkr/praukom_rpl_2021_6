<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KompetensiController extends Controller
{
    protected $kompetensi;
    public function __construct()
    {
        $this->kompetensi = new Kompetensi();
    }
    public function index()
    {
        $dataview = DB::table('view_kompetensi')
            ->select()
            ->get();

        $datajurusan = DB::table('view_jurusan_kompetensi')
            ->select()
            ->get();
            // dd($datajurusan);
        
        return view('dashboard.modules.kompetensi',[
                'dataview'=>$dataview,
                'datajurusan'=>$datajurusan
              ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {
        // dd($request);
        //insert tabel nilai
          Kompetensi::create([
            "nama_kompetensi" => $request->nama_kompetensi,
            "id_jurusan" => $request->id_jurusan,
          ]);
          return redirect('kompetensi');

        
    }

    public function hapus($id_kompetensi)
    {
        
        $hapus = DB::table('kompetensi')
                        ->where('id_kompetensi',$id_kompetensi)
                        ->delete();
      
        if($hapus){
            return back();
        }
    }

    public function cari(Request $request)
	{
        $dataview = DB::table('view_kompetensi')
        ->select()
        ->get();

        $datajurusan = DB::table('jurusan')
        ->select()
        ->get();

		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$dataview = DB::table('view_kompetensi')
		->where('nama_kompetensi','like',"%".$cari."%")
        ->orWhere('nama_jurusan','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('dashboard.modules.kompetensi',['dataview' => $dataview,
                                                    'datajurusan' => $datajurusan
                                                    ]);
 
	}
  
       //UPDATE 
   public function edit($id)
   {

       $datakompetensi = DB::table('view_kompetensi')
                    ->where('id_kompetensi', $id)
                    ->select()
                    ->get();
                    // dd($datajurusan);

       return view('dashboard.modules.editkompetensi', ['datakompetensi' => $datakompetensi]);
   }
   public function update(Request $request)
    {
        // dd($request);
      
        DB::table('kompetensi')
            ->where('id_kompetensi','=', $request->id_kompetensi)

        ->update([
        
            'nama_kompetensi' => $request->nama_kompetensi
        ]);

        return redirect('kompetensi');
           
    } 

}
