<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staffhubin;
use App\Models\User;
use App\Http\Requests\StoreStaffhubinRequest;
use App\Http\Requests\UpdateStaffhubinRequest;
use App\Models\Leveluser;
use App\Models\Viewperusahaanaktif;
use App\Models\Viewprakerin;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $levelUser;
    // protected $ambilnikpp;
    
    public function __construct()
    {
        $this->levelUser = Leveluser::all();
        // $this->ambilnikpp = Auth::user()->pembimbingperusahaan->nik_pp;
    }
    public function index(Request $request)
    {   
        return view('dashboard.index', [
            'level_user' => $this->levelUser,
            'view_perusahaan_aktif' => Viewperusahaanaktif::orderBy('jml_murid', 'desc')
            ->paginate(5)
            // ,
            // 'view_pp_siswa' => Viewprakerin::where('nik_pp',request('ambilnikpp'))
            // ->orderBy('id_prakerin', 'desc')
            // ->paginate(5)
        ]);
    }
}