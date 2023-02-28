<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class KelasController extends Controller
{
    protected $kelas;
    protected $angkatan;
    public function __construct()
    {
        $this->kelas = new Kelas();
        $this->kelas = new Angkatan();
    }
    public function index()
    {
        $dataview = DB::table('view_kelas')
            ->select()
            ->get();

        $data_jurusan = DB::table('jurusan')
            ->select()
            ->get();

        $data_walas = DB::table('view_walas')
            ->select()
            ->get();

        $data_angkatan = DB::table('angkatan')
            ->select()
            ->get();
        
        return view('dashboard.modules.kelas',[
                'dataview'=>$dataview,
                'datajurusan'=>$data_jurusan,
                'datawalas'=>$data_walas,
                'dataangkatan'=>$data_angkatan,
              ]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenilaianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function simpanKelas(Request $request)
    {
        // dd($request);
        //insert tabel nilai
        $validated = $request->validate([
            "tingkat_kelas" => ['required'],
            "wali_kelas" => ['required'],
            "jurusan" => ['required'],
            "angkatan" => ['required'],
          ]);

          try {
            
            Kelas::create([
                "nama_kelas" => $request->bagian_kelas,
                "tingkat_kelas" => $validated['tingkat_kelas'],
                "id_walas" => $validated['wali_kelas'],
                "id_jurusan" => $validated['jurusan'],
                "id_angkatan" => $validated['angkatan'],
              ]);

           
    
            } catch(\Exception $e) {
              // reload page apabila gagal buat akun
            //   return back()->withErrors('Jurusan gagal dibuat');
                return $e->getMessage();
            }
          // redirect ke hubin/leveluser apabila sukses buat akun
          return redirect('/kelas')->withSuccess('kelas berhasil dibuat');

        
    }

    public function simpanAngkatan(Request $request)
    {
        $validated = $request->validate([
            "tahun" => ['required'],
          ]);

          try {
            
            Angkatan::create([
                "tahun" => $validated['tahun'],
              ]);

           
    
            } catch(\Exception $e) {
            //   return back()->withErrors('Jurusan gagal dibuat');
                return $e->getMessage();
            }
          // redirect ke hubin/leveluser apabila sukses buat akun
          return redirect('/kelas')->withSuccess('Angkatan berhasil dibuat');


        
    }

    public function hapusKelas($id_kelas)
    {
        
        $hapus = DB::table('kelas')
                        ->where('id_kelas',$id_kelas)
                        ->delete();
      
        if($hapus){
            return back();
        }
    }

    // public function hapusAngkatan($id_angkatan)
    // {
        
    //     $hapus = DB::table('angkatan')
    //                     ->where('id_angkatan',$id_angkatan)
    //                     ->delete();
      
    //     if($hapus){
    //         return back();
    //     }
    // }

    public function cariKelas(Request $request)
	{
        $dataview = DB::table('view_jurusan_kompetensi')
        ->select()
        ->get();

		$cari = $request->cari;
 
    	$dataview = DB::table('view_kelas')
            ->select()
            ->get();

        $data_jurusan = DB::table('jurusan')
            ->select()
            ->get();

        $data_walas = DB::table('view_walas')
            ->select()
            ->get();

        $data_angkatan = DB::table('angkatan')
            ->select()
            ->get();

        $dataview = DB::table('view_kelas')
		->where('nama_walas','like',"%".$cari."%")
        ->orWhere('tahun',$cari)
        ->orWhere('nama_kelas',$cari)
        ->orWhere('nama_jurusan','like',"%".$cari."%")
        ->orWhere('tingkat_kelas',$cari)
		->paginate(10);
        
        return view('dashboard.modules.kelas',[
                'dataview'=>$dataview,
                'datajurusan'=>$data_jurusan,
                'datawalas'=>$data_walas,
                'dataangkatan'=>$data_angkatan,
              ]);
 
	}

    public function cariAngkatan(Request $request)
	{
        $dataview = DB::table('view_jurusan_kompetensi')
        ->select()
        ->get();

		$cari2 = $request->cari2;
 
    	$dataview = DB::table('view_kelas')
            ->select()
            ->get();

        $data_jurusan = DB::table('jurusan')
            ->select()
            ->get();

        $data_walas = DB::table('view_walas')
            ->select()
            ->get();

        $data_angkatan = DB::table('angkatan')
            ->where('tahun',$cari2)
            ->get();
        
        return view('dashboard.modules.kelas',[
                'dataview'=>$dataview,
                'datajurusan'=>$data_jurusan,
                'datawalas'=>$data_walas,
                'dataangkatan'=>$data_angkatan,
              ]);
 
	}
  
       //UPDATE 
   public function editKelas($id)
   {

        $dataview = DB::table('view_kelas')
                    ->where('id_kelas', $id)
                    ->select()
                    ->get();
        $data_jurusan = DB::table('jurusan')
                    ->select()
                    ->get();
        $data_walas = DB::table('view_walas')
                    ->select()
                    ->get();
        
       $data_angkatan = DB::table('angkatan')
                    ->select()
                    ->get();
                    

       return view('dashboard.modules.editkelas', [ 'dataview'=>$dataview,
                                                    'datajurusan'=>$data_jurusan,
                                                    'datawalas'=>$data_walas,
                                                    'dataangkatan'=>$data_angkatan,
                                                ]);
   }


   public function editAngkatan($id)
   {    
       $data_angkatan = DB::table('angkatan')
                    ->where('id_angkatan',$id)
                    ->select()
                    ->get();
                    

       return view('dashboard.modules.editangkatan', [ 
                                                    'dataangkatan'=>$data_angkatan
                                                ]);
   }

   public function updateKelas(Request $request)
    {
        // dd($request);
      
        try {
            DB::table('kelas')
            ->where('id_kelas','=', $request->id_kelas)
            ->update([
        
                "id_walas" => $request->id_walas,
                "id_jurusan" => $request->id_jurusan,
                "id_angkatan" => $request->id_angkatan,
                "nama_kelas" => $request->nama_kelas,
                "tingkat_kelas" => $request->tingkat_kelas
    
            ]);
        } catch (\Exception $e) {
             // return back()->withErrors('Jurusan gagal dibuat');
             return $e->getMessage();
            }
          // redirect ke hubin/leveluser apabila sukses buat akun
          return redirect('/kelas')->withSuccess('Kelas berhasil diupdate');
           
    } 
    public function updateAngkatan(Request $request)
    {
        // dd($request);
        try {
            DB::table('angkatan')
            ->where('id_angkatan','=', $request->id_angkatan)

            ->update([
                "tahun" => $request->tahun
                ]);
        } catch (\Exception) {
            return back()->withErrors('Angkatan gagal diupdate');
        }
        
        return redirect('/kelas')->withSuccess('Angkatan berhasil diupdate');
   }
}
