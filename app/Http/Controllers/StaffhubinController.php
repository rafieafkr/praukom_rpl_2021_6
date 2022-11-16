<?php

namespace App\Http\Controllers;

use App\Models\Staffhubin;
use App\Http\Requests\StoreStaffhubinRequest;
use App\Http\Requests\UpdateStaffhubinRequest;

class StaffhubinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hubin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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