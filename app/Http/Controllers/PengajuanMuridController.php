<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PengajuanMuridController extends Controller
{
public function form(){
    return view('Dashboard.suratpengajuanmurid');
}
}
