<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Http\Requests\StorePengajuanRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{

    protected $suratpengajuan;

    public function __construct()
    {
        $this->suratpengajuan = Pengajuan::all();
    }

    public function indexsuratpengajuan()
    {
        if (Auth::user()->level_user == 1):
            return view('suratpengajuan.index', [
                'sp3' => Pengajuan::where('status_pengajuan','=',5)
                ->orWhere('status_pengajuan','=',6)
                ->orWhere('status_pengajuan','=',7)
                ->orderBy('id_pengajuan', 'desc')->paginate(10)->withQueryString()
            ]);
        endif;

        if (Auth::user()->level_user == 2):
            return view('suratpengajuan.index', [
                'sp' => Pengajuan::where('status_pengajuan','=',3)
                ->orWhere('status_pengajuan','=',4)
                ->orderBy('id_pengajuan', 'desc')->paginate(10)->withQueryString(),
            ]);
        endif;
        
        if (Auth::user()->level_user == 3):
            return view('suratpengajuan.index', [
                'sp2' => Pengajuan::where('status_pengajuan','=',1)
                ->orWhere('status_pengajuan','=',2)
                ->orderBy('id_pengajuan', 'desc')->paginate(10)->withQueryString(),
            ]);
        endif;
    }

    public function carisuratpengajuan(Request $request)
	{
		$caripengajuan = Pengajuan::where('nis','like',"%".request('show')."%")
        ->get();

        // dd($caripengajuan);
        if (Auth::user()->level_user == 1):
            return view('suratpengajuan.index', [
                'sp3' =>  $caripengajuan
            ]);
        endif;

        if (Auth::user()->level_user == 2):
            return view('suratpengajuan.index', [
                'sp' =>  $caripengajuan
            ]);
        endif;
        
        if (Auth::user()->level_user == 3):
            return view('suratpengajuan.index', [
                'sp2' =>  $caripengajuan
            ]);
        endif;
	}

    public function detailsuratpengajuan($id_pengajuan)
    {   
        $dataupdt = $this->suratpengajuan->find($id_pengajuan);

        // $dataupdt =  DB::table('pengajuan')
        // ->where('id_pengajuan', $id_pengajuan)
        // ->select()
        // ->get();

        // dd($dataupdt);

        return view('suratpengajuan.edit', [
            'edit' => $dataupdt
        ]);
    }

    public function updateterima(Request $request)
    {
        $dataTerima = [
            'status_pengajuan' => $request->status_pengajuan
        ];
        $upd = DB::table('pengajuan')
        -> where('id_pengajuan', $request->input('id_pengajuan'))
        -> update($dataTerima);
        // dd($dataTerima);
        if ($upd) {
            return redirect('/suratpengajuan')->withSuccess('Pengajuan berhasil diverifikasi !');
        }
    }

    public function updatehubin(Request $request)
    {
        $dataTerima = [
            'id_pengajuan' => $request->id_pengajuan,
            'status_pengajuan' => $request->status_pengajuan
        ];
        $upd = DB::table('pengajuan')
        -> where('id_pengajuan', $request->input('id_pengajuan'))
        -> update($dataTerima);
        // dd($dataTerima);
        if ($upd) {
            return redirect('/suratpengajuan')->withSuccess('Pengajuan berhasil diverifikasi !');
        }
    }

    public function updatetolak(Request $request)
    {
        $dataTolak = [
            'status_pengajuan'   => $request->status_pengajuan
        ];
        $upd = DB::table('pengajuan')
        -> where('id_pengajuan', $request->input('id_pengajuan'))
        -> update($dataTolak);
        if ($upd) {
            return redirect('/suratpengajuan')->withAlert('Pengajuan berhasil ditolak !');
        }
    }

    public function hapussuratpengajuan(Request $request, $id_pengajuan)
    {
        $hapus = DB::table('pengajuan')
                ->where('id_pengajuan', $request->id_pengajuan)
                ->delete();

        if($hapus){
            return redirect('/suratpengajuan');
        }
    }
}