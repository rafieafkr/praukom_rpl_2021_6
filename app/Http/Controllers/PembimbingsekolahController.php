<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pembimbingsekolah;
use App\Http\Requests\StorePembimbingsekolahRequest;
use App\Http\Requests\UpdatePembimbingsekolahRequest;
use App\Models\Monitoring;
use App\Models\Presensisiswa;
use Illuminate\Support\Facades\Request;

class PembimbingsekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $presensi;
    protected $monitoring;
    
    public function __construct()
    {
        $this->presensi = Presensisiswa::all();
        $this->monitoring = Monitoring::all();
    }
    public function presensi()
    {
        return view('presensi.index',
        [
            'presensi' => $this->presensi
        ]);
    }

    public function monitoring()
    {
        // $Monitoring = Monitoring::all();

        // return response()->json($hubin);

        // Mengirim data monitoing ke view (monitoring.index).
        return view('monitoring.index',[
            'title' => 'Monitoring',
            'monitoring' => $this->monitoring
        ]);
    }
    public function tambahmonitoring(){
        return view('monitoring.tambah');
    }
    public function storemonitoring(Request $request)
    {
            $data = [
                'id_ps' => $request->input('id_ps'),
                'id_kepsek' => $request->input('id_kepsek'),
                'id_perusahaan' => $request->input('id_perusahaan'),
                'tanggal' => $request->input('tanggal'),
                'resume' => $request->input('resume'),
                'verifikasi' => $request->input('verifikasi'),
            ];
            // Memasukan data ke Database.
            $insert = $this->Supplier::create($data);
            if ($insert) {
                return redirect('monitoring');
            } else {
                return "input data gagal";
            }
    }
    public function editmonitoring($id_monitoring = null)
    {
        $edit = $this->Monitoring->whereIdMonitoring($id_monitoring)->first();
        return view('monitoring.edit', ['edit' => $edit]);
    }
    public function updatemonitoring(Request $request)
    {
        $data = [
            'id_ps' => $request->input('id_ps'),
            'id_kepsek' => $request->input('id_kepsek'),
            'id_perusahaan' => $request->input('id_perusahaan'),
            'tanggal' => $request->input('tanggal'),
            'resume' => $request->input('resume'),
            'verifikasi' => $request->input('verifikasi'),
        ];
        $upd = $this->Monitoring
                    ->where('id_monitoring', $request->input('id_monitoring'))
                    ->update($data);
        if ($upd) {
            return redirect('monitoring');
        } else {
            return "update data gagal";
        }
    }
    public function destroymonitoring($id_monitoring = null)
    {
        $hapus = $this->Monitoring
                            ->where('id_monitoring',$id_monitoring)
                            ->delete();
            if($hapus){
                return redirect('monitoring');
            }
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
     * Display the specified resource.
     *
     * @param  \App\Models\Pembimbingsekolah  $pembimbingsekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Pembimbingsekolah $pembimbingsekolah)
    {
        //
    }
}