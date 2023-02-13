<?php

namespace App\Http\Controllers;

use App\Models\kepalaprogram;
use App\Models\Prakerin;
use App\Http\Requests\StorekepalaprogramRequest;
use App\Http\Requests\UpdatekepalaprogramRequest;
use App\Models\Pembimbingsekolah;
use App\Models\Pengajuan;
use App\Models\Viewlistps;
use App\Models\Viewprakerin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KepalaprogramController extends Controller
{
    protected $pilihPs;
    protected $pembimbingsekolah;
    protected $suratpengajuan;
    protected $ambilViewPs;
    protected $prakerin;
    
    public function __construct()
    {
        $this->pembimbingsekolah = Viewlistps::all();
        $this->pilihPs = Prakerin::all();
        $this->ambilViewPs = Viewlistps::all();
        $this->suratpengajuan = Pengajuan::all();
        $this->prakerin = Viewprakerin::all();
    }

    public function indexps()
    {
        return view('pilihps.index',[
            'title' => 'Pilih Pembimbing Perusahaan',
            'prakerin' => $this->ambilViewPs
        ]);
    }

    public function carips(Request $request)
	{
		$carips = Viewprakerin::where('nis','like',"%".request('show')."%")
        ->get();

        // dd($caripengajuan);
 
		return view('pilihps.index',[
            'title' => 'Pilih Pembimbing Perusahaan',
            'prakerin' => $carips
        ]);
 
	}

    public function editps($id_prakerin)
    {       
        $edit =  DB::table('prakerin')
        ->where('id_prakerin', $id_prakerin)
        ->select()
        ->get();
        
        return view('pilihps.edit', [
            'edit' => $edit,
            'pembimbing_sekolah' => $this->pembimbingsekolah
        ]);
    }

    public function updateps(Request $request)
    {
        $upd = DB::table('prakerin')
        -> where('id_prakerin', '=', $request->id_prakerin)
        -> update([
            'id_ps' => $request->id_ps
        ]);
        if ($upd) {
            return redirect('/pilihpembimbingsekolah');
        } else {
    
        }
    }

    public function indexsuratpengajuan()
    {
        return view('suratpengajuan.index',[
            'title' => 'Surat Pengajuan',
            'sp' => Pengajuan::where('status_pengajuan','=',3)
            ->orWhere('status_pengajuan','=',4)
            ->orderBy('id_pengajuan', 'desc')->paginate(10)->withQueryString(),
            'sp2' => Pengajuan::where('status_pengajuan','=',1)
            ->orWhere('status_pengajuan','=',2)
            ->orderBy('id_pengajuan', 'desc')->paginate(10)->withQueryString(),
            'sp3' => Pengajuan::where('status_pengajuan','=',5)
            ->orWhere('status_pengajuan','=',6)
            ->orWhere('status_pengajuan','=',7)
            ->orderBy('id_pengajuan', 'desc')->paginate(10)->withQueryString()
        ]);
      
    }

    public function carisuratpengajuan(Request $request)
	{
		$caripengajuan = Pengajuan::where('nis','like',"%".request('show')."%")
        ->get();

        // dd($caripengajuan);
 
		return view('suratpengajuan.index',[
            'sp' => $caripengajuan,
            'sp2' => $caripengajuan,
            'sp3' => $caripengajuan
        ]);
 
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
        } else {
    
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
        } else {
   
        }
    }

    public function hapussuratpengajuan(Request $request, $id_pengajuan)
    {
        $hapus = $this->suratpengajuan
                ->where('id_pengajuan', $request->id_pengajuan)
                ->delete();

        if($hapus){
            return redirect('/suratpengajuan');
        }
    }

    public function dataprakerin()
    {
        return view('prakerin.index',
        [
            'prakerin' => $this->prakerin
        ]);
    }

}