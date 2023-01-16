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
        $dataview = DB::table('presensi_siswa')
            ->join('prakerin', 'prakerin.nis', '=', 'presensi_siswa.nis')
            ->join('siswa', 'siswa.nis', '=', 'presensi_siswa.nis')
            ->join('pembimbing_perusahaan', 'pembimbing_perusahaan.nik_pp', '=', 'presensi_siswa.nik_pp')
            ->select('prakerin.*','presensi_siswa.*', 'siswa.nama_siswa','pembimbing_perusahaan.*')
            ->get();
            return view('dashboard.module.presensi',compact('prakerin'),['dataview'=>$dataview,
                                                                         'prakerin'=>$prakerin
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

    //INSERT
    public function simpan(Request $request)
    {
        //insert tabel nilai
        try {
            $datapresensi = [
                'nis' => $request->input('nis'),
                'nik_pp' => $request->input('nik_pp'),
                'keterangan' => $request->input('keterangan'),
                'tgl_kehadiran' => $request->input('tgl_kehadiran'),
                'jam_masuk' => $request->input('jam_masuk'),
                'jam_keluar' => $request->input('jam_keluar'),
                'kegiatan' => $request->input('kegiatan')  
            ];
            // dd($datanilai);
            //insert data ke database
            // $insert = $this->nilai->create($datanilai);
            $insert = Presensisiswa::create($datapresensi);
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

   //UPDATE 
   public function edit($id)
   {
    
       $dataupdt = DB::table('presensi_siswa')
                    ->where('id_presensi', $id)
                    ->select()
                    ->get();
                    // dd($dataupdt);

       return view('dashboard.module.editpresensi', ['dataupdt' => $dataupdt]);
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