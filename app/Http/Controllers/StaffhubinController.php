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

class StaffhubinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {

    }
    public function index(Request $request)
    {   
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gantifoto(Request $request, $id)
    {
        // $this->validate($request, [
        //     'foto' => 'image|mimes:jpg,png,jpeg|max:2048',
        // ]);

        // $image_path = $request->file('foto')->store('foto_profile');

        // $foto = [
        //     'foto' => $image_path
        // ];

        // $upd = DB::table('akun')
        // -> where('id', $request->id)
        // -> update($foto);
        // if ($upd) {
        //     dd($upd);
        // } else {
    
        // }

        // session()->flash('success', 'Image Upload successfully');

        // return redirect()->route('/dashboard');
        
        // return $request->file('foto')->store('foto_profile');

        // $foto = [
        //     'foto' => $request->foto
        // ];

        // dd($foto);
        
        // $upd = DB::table('akun')
        // -> where('id', $request->id)
        // -> update($foto);
        // if ($upd) {
        //     return redirect('/dashboard');
        // } else {
    
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffhubinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffhubinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staffhubin  $staffhubin
     * @return \Illuminate\Http\Response
     */
    public function show(Staffhubin $staffhubin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staffhubin  $staffhubin
     * @return \Illuminate\Http\Response
     */
    public function edit(Staffhubin $staffhubin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffhubinRequest  $request
     * @param  \App\Models\Staffhubin  $staffhubin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffhubinRequest $request, Staffhubin $staffhubin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staffhubin  $staffhubin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staffhubin $staffhubin)
    {
        //
    }
}