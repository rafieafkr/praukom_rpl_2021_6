<?php

namespace App\Http\Controllers;

use App\Models\Viewlistps;
use App\Models\Viewprakerin;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KepalaprogramController extends Controller
{
    protected $pembimbingsekolah;
    protected $prakerin;
    
    public function __construct()
    {
        $this->pembimbingsekolah = Viewlistps::all();
        $this->prakerin = Viewprakerin::all();
    }

    public function indexps()
    {
        return view('pilihps.index',[
            'title' => 'Pilih Pembimbing Perusahaan',
            'prakerin' => $this->prakerin
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
            'ps' => $this->pembimbingsekolah
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
}