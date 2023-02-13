<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pembimbingsekolah;
use App\Http\Requests\StorePembimbingsekolahRequest;
use App\Http\Requests\UpdatePembimbingsekolahRequest;
use App\Models\Monitoring;
use App\Models\Prakerin;
use App\Models\Presensisiswa;
use App\Models\Viewprakerin;
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
    protected $prakerin;
    protected $viewprakerin;
    
    public function __construct()
    {
        $this->presensi = Presensisiswa::all();
        $this->monitoring = Monitoring::all();
        $this->prakerin = Prakerin::all();
        $this->viewprakerin = Viewprakerin::all();
    }
    
    public function presensi()
    {
        return view('presensi.index',
        [
            'presensi' => $this->presensi
        ]);
    }

    public function dataprakerin()
    {
        return view('prakerin.index',
        [
            'prakerin' => $this->viewprakerin
        ]);
    }

    public function cariprakerin(Request $request)
	{
		$cariprakerin = Viewprakerin::where('nis','like',"%".request('show')."%")
        ->get();

        // dd($caripengajuan);
 
		return view('prakerin.index',[
            'prakerin' => $cariprakerin
        ]);
	}

    public function detailprakerin($id_prakerin)
    {
        $detail = $this->prakerin->find($id_prakerin);

        // dd($detail);

        return view('prakerin.detail', [
            'edit' => $detail
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