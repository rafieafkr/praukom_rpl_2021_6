<?php

namespace App\Http\Controllers;

use App\Models\Presensisiswa;
use App\Http\Requests\StorePresensisiswaRequest;
use App\Http\Requests\UpdatePresensisiswaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PresensisiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $presensisiswa;
    public function __construct()
    {
        $this->presensisiswa = new Presensisiswa();
    }
    public function index()
    {
      //get data view
      $prakerin = DB::table('prakerin')
          ->select()
          ->get();

      //get data form
      $dataview = DB::table('view_presensi')
          ->paginate(5);
      
      $statuspresensi = DB::table('presensi_siswa')
          ->where('status_hadir', '=','0')
          ->orWhere('status_hadir', '=','1')
          ->orWhere('status_hadir', '=','2')
          ->get(); 
      

      return view('dashboard.modules.presensi',compact('prakerin'),[
        'dataview'=>$dataview,
        'prakerin'=>$prakerin,
        'status' =>$statuspresensi
      ]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
    $prakerin = DB::table('prakerin')
    ->select()
    ->get();
		$cari = $request->cari;

    // mengambil data dari table pegawai sesuai pencarian data
		$dataview = DB::table('view_presensi')
		->where('nama_siswa','like',"%".$cari."%")
		->paginate();

    // mengirim data pegawai ke view index
		return view('dashboard.modules.presensi',[
      'dataview' => $dataview,
      'prakerin' => $prakerin]);
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

    //INSERT
    public function simpan(Request $request)
    {
      //insert tabel nilai
      try {
          $dataview = [
              'nis' => $request->input('nis'),
              'nik_pp' => $request->input('nik_pp'),
              'keterangan' => $request->input('keterangan'),
              'tgl_kehadiran' => $request->input('tgl_kehadiran'),
              'jam_masuk' => $request->input('jam_masuk'),
              'jam_keluar' => $request->input('jam_keluar'),
              'kegiatan' => $request->input('kegiatan'),
              'foto_kegiatan' => $request->input('foto_kegiatan'),  
              'status_hadir' => 1
          ];
          // dd($datanilai);
          
          //insert data ke database
          // $insert = $this->nilai->create($datanilai);
          $insert = Presensisiswa::create($dataview);
          if ($insert) {
              //redirect('gudang','refresh');
              return redirect('presensi');
          } else {
              return "input data gagal";
          }
      } catch (\Exception $e) {
          return $e->getMessage();
          return "yaaah error nih, sorry ya";
      }
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
    

   //UPDATE 
    public function edit($id)
    {
      $dataupdt = DB::table('presensi_siswa')
                  ->where('id_presensi', $id)
                  ->select()
                  ->get();
                  // dd($dataupdt);

      return view('dashboard.modules.editpresensi', ['dataupdt' => $dataupdt]);
    }

    public function update(Request $request)
    {
        // dd($request);
      
        $upd = DB::table('presensi_siswa')
              ->where('id_presensi','=', $request->id_presensi)    
              ->update([
                  'tgl_kehadiran'=>$request->tgl_kehadiran,
                  'jam_masuk' => $request->jam_masuk,
                  'jam_keluar' => $request->jam_keluar,
                  'keterangan' => $request->keterangan,
                  'kegiatan' => $request->kegiatan,
              ]);
        
        if ($upd) {
            return redirect('presensi');
        } else {
            return "update data gagal";
        }
    } 

    public function terimapresensi(Request $request, $id_presensi)
    {
        $terimapresensi = [
            'status_hadir' => $request->status_hadir
        ];
        $upd = DB::table('presensi_siswa')
        -> where('id_presensi', $id_presensi)
        -> update($terimapresensi);
        if ($upd) {
            return back();
        } else {
            return back();
        }
        
    }

    public function tolakpresensi(Request $request, $id_presensi)
    {
        $terimapresensi = [
            'status_hadir' => $request->status_hadir
        ];
        $upd = DB::table('presensi_siswa')
        -> where('id_presensi', $id_presensi)
        -> update($terimapresensi);
        if ($upd) {
            return back();
        } else {
            return back();
        }

}

    public function filter_presensi(Request $request)
      {
        // menangkap data pencarian
        $prakerin = DB::table('prakerin')
        ->select()
        ->get();
        $filterpresensi = $request->filter;

        // mengambil data dari table presensi_siswa sesuai pencarian data
        $dataview = DB::table('view_presensi')
        ->where('status_hadir',$filterpresensi)
        ->paginate();

        return view('dashboard.modules.presensi',[
          'dataview' => $dataview,
          'prakerin' => $prakerin
          ]);
      }

}