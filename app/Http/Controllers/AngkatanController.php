<?php

namespace App\Http\Controllers;

use App\Models\angkatan;
use App\Http\Requests\StoreangkatanRequest;
use App\Http\Requests\UpdateangkatanRequest;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreangkatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreangkatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function show(angkatan $angkatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function edit(angkatan $angkatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateangkatanRequest  $request
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateangkatanRequest $request, angkatan $angkatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(angkatan $angkatan)
    {
        //
    }
}
