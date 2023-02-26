<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Prakerin;
use App\Models\Viewprakerin;
use Illuminate\Support\Facades\Request;

class PrakerinController extends Controller
{
    protected $prakerin;
    protected $viewprakerin;
    
    public function __construct()
    {
        $this->prakerin = Prakerin::all();
        $this->viewprakerin = Viewprakerin::all();
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

    public function hapusprakerin($id_prakerin)
    {
        $hapus = Prakerin::where('id_prakerin', '=', $id_prakerin)->delete();

        if($hapus){
            return redirect('/dataprakerin');
        }
    }
    
    public function pecatSiswa(Prakerin $prakerin)
    {
        try {
            DB::select('CALL procedure_pecat_siswa_pkl (?,?)', [
                $prakerin->id_prakerin,
                $prakerin->nis
            ]);
        } catch (\Exception $th) {
            return redirect('/dataprakerin')->withErrors('Siswa telah dikeluarkan');          
        }
        
        return redirect('/dataprakerin')->withSuccess('Siswa telah dikeluarkan');          
    }

}