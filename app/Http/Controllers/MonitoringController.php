<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    protected $monitoring;
    
    public function __construct()
    {
        $this->monitoring = Monitoring::all();
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
  
    public function editmonitoring($id_monitoring = null)
    {
        $edit = DB::table('monitoring')
                ->where('id_monitoring', $id_monitoring)
                ->select()
                ->get();
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
        $upd = $this->monitoring
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
        $hapus = $this->monitoring
                            ->where('id_monitoring',$id_monitoring)
                            ->delete();
            if($hapus){
                return redirect('monitoring');
            }
    }
}