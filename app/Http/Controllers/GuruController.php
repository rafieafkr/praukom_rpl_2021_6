<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Http\Requests\StoreguruRequest;
use App\Http\Requests\UpdateguruRequest;

class GuruController extends Controller
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
     * @param  \App\Http\Requests\StoreguruRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreguruRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateguruRequest  $request
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateguruRequest $request, guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(guru $guru)
    {
        //
    }
}
