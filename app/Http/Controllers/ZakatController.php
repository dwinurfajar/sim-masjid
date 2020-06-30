<?php

namespace App\Http\Controllers;

use App\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zakat = DB::table('zakats')->get();
        return view('backend/zakat/zakat', compact('zakat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/zakat/create');
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
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function show(Zakat $zakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Zakat $zakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zakat $zakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zakat $zakat)
    {
        //
    }
}
