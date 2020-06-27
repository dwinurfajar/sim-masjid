<?php

namespace App\Http\Controllers;

use App\Infaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infaq = DB::table('infaqs')->get();
        return view('backend/infaq/infaq', ['infaq' => $infaq]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/infaq/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'infaq' => 'required',
            'pengeluaran' => 'required',
            'tanggal' => 'required'
        ]);

        $saldo = \App\Infaq::all() -> last();

        $infaq =  new Infaq;
        $infaq->infaq = $request->infaq;
        $infaq->pengeluaran = $request->pengeluaran;
        $infaq->saldo = $saldo->saldo+$request->infaq-$request->pengeluaran;
        $infaq->tanggal = $request->tanggal;
        $infaq->save();
        return back()->with('status', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function show(Infaq $infaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function edit(Infaq $infaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Infaq $infaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Infaq  $infaq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Infaq $infaq)
    {
        Infaq::destroy($infaq->id);
        return back()->with('status', 'Berhasil dihapus');
    }
}
