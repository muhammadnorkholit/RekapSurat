<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap = Rekap::paginate(10);
        return view('dashboard.rekap.index',compact('rekap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.rekap.create',compact('tahunAjaran','guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap $rekap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap $rekap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap $rekap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekap  $rekap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap $rekap)
    {
        //
    }
}
