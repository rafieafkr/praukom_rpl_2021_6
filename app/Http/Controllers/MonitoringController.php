<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use App\Models\Prakerin;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    protected $Monitoring;

    // Mendefinisikan $Monitoring & Middleware.
    public function __construct()
    {
        $this->Monitoring = new Monitoring;
        // $this->middleware('auth:web',[]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Monitoring = Monitoring::all();

        // return response()->json($hubin);

        $Monitoring = DB::table('monitoring')
        ->paginate(5);

        // Mengirim data monitoing ke view (monitoring.index).
        return view('monitoring.index',[
            'title' => 'Monitoring',
            'monitoring' => $Monitoring
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah(){
        return view('monitoring.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMonitoringRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $Monitoring, $id_monitoring = null)
    {
        $edit = $this->Monitoring->whereIdMonitoring($id_monitoring)->first();
        return view('monitoring.edit', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonitoringRequest  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitoring $monitoring)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoring, $id_monitoring = null)
    {
        $hapus = $this->Monitoring
                            ->where('id_monitoring',$id_monitoring)
                            ->delete();
            if($hapus){
                return redirect('monitoring');
            }
    }
}