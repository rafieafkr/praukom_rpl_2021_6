<?php

namespace App\Http\Controllers;

use App\Models\Presensisiswa;
use App\Http\Requests\StorePresensisiswaRequest;
use App\Http\Requests\UpdatePresensisiswaRequest;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

      //get data view
      $jurusan = DB::table('jurusan')
          ->select()
          ->get();

      return view('dashboard.modules.jurusan',[
        'jurusan'=>$jurusan
      ]);
    }

    public function getPp(Request $request)
    {
      $pp = DB::table('prakerin')
          ->where('nis', $request->nis)
          ->get();
      
      if (count($pp) > 0) {
          return response()->json($pp);
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

    public function print($id)
    {
      $data_presensi = DB::table('view_presensi')
                        ->where('nis', $id)
                        ->select()
                        ->get();
                  //  dd($data_presensi);
                  
      return view('dashboard.modules.laporan_presensi  ', ['data_presensi' => $data_presensi]);
    }     

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presensisiswa  $presensisiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presensisiswa $presensisiswa)
    {
        //
    }
}