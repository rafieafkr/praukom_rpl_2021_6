<?php

namespace App\Http\Controllers;

use App\Models\Prakerin;
use App\Http\Requests\StorePrakerinRequest;
use App\Http\Requests\UpdatePrakerinRequest;
use Illuminate\Support\Facades\DB;

class PrakerinController extends Controller
{
    // Mendefinisikan $Prakerin & Middleware.
    public function __construct()
    {
        $this->Prakerin = new Prakerin;
        // $this->middleware('auth:web',[]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\Http\Requests\StorePrakerinRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrakerinRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function show(Prakerin $prakerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function edit(Prakerin $prakerin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePrakerinRequest  $request
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrakerinRequest $request, Prakerin $prakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prakerin  $prakerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prakerin $prakerin)
    {
        //
    }
}