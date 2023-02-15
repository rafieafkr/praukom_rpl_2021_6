<?php

namespace App\Http\Controllers;

use App\Models\Presensisiswa;
use App\Http\Requests\StorePresensisiswaRequest;
use App\Http\Requests\UpdatePresensisiswaRequest;

class PresensisiswaController extends Controller
{
    protected $presensi;
    
    public function __construct()
    {
        $this->presensi = Presensisiswa::all();
    }
    
    public function presensi()
    {
        return view('presensi.index',
        [
            'presensi' => $this->presensi
        ]);
    }
}