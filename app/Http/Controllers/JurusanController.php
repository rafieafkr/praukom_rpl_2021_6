<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    protected $jurusan;
    public function __construct()
    {
        $this->jurusan = new Jurusan();
    }
    public function index()
    {
        $dataview = DB::table('view_jurusan_kompetensi')
            ->select()
            ->get();

        $datakaprog = DB::table('view_kaprog')
            ->select()
            ->get();
        
        return view('dashboard.modules.jurusan',[
                'dataview'=>$dataview,
                'datakaprog'=>$datakaprog
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
          Jurusan::create([
            "nama_jurusan" => $request->nama_jurusan,
            "kepala_jurusan" => $request->kepala_jurusan,
            "akronim" => $request->akronim,
          ]);
          return redirect('jurusan');

        
    }

    public function hapus($id_jurusan)
    {
        
        $hapus = DB::table('jurusan')
                        ->where('id_jurusan',$id_jurusan)
                        ->delete();
      
        if($hapus){
            return back();
        }
    }

    public function cari(Request $request)
	{
        $dataview = DB::table('view_jurusan_kompetensi')
        ->select()
        ->get();

        $datakaprog = DB::table('view_kaprog')
        ->select()
        ->get();

		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$dataview = DB::table('view_jurusan_kompetensi')
		->where('nama_jurusan','like',"%".$cari."%")
        ->orWhere('akronim','like',"%".$cari."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('dashboard.modules.jurusan',['dataview' => $dataview,
                                                 'datakaprog' => $datakaprog            
                                                ]);
 
	}
  
       //UPDATE 
   public function edit($id)
   {

       $datajurusan = DB::table('view_jurusan_kompetensi')
                    ->where('id_jurusan', $id)
                    ->select()
                    ->get();
                    // dd($datajurusan);
       $datakaprog = DB::table('view_kaprog')
                    ->select()
                    ->get();

       return view('dashboard.modules.editjurusan', ['datajurusan' => $datajurusan,
                                                    'datakaprog' => $datakaprog]);
   }
   public function update(Request $request)
    {
        // dd($request);
      
        DB::table('jurusan')
            ->where('id_jurusan','=', $request->id_jurusan)

        ->update([
        
            'nama_jurusan' => $request->nama_jurusan,
            'akronim' => $request->akronim,
            'kepala_jurusan' => $request->kepala_jurusan

        ]);

        return redirect('jurusan');
           
    } 
   }
    
   
   
   
