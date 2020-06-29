<?php

namespace App\Http\Controllers;

use App\Keluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = date('m');
        $kluar = DB::table('keluars')->whereMonth('tanggal', $month)->orderBy('tanggal', 'desc')->get();
        $keluar = DB::table('keluars')->orderBy('tanggal', 'desc')->get();
        return view('backend/keuangan/keluar/keluar', compact('keluar','kluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/keuangan/keluar/create');
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
            'jumlah' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
        ]);

        $masuk = new Keluar;
        $masuk->jumlah = $request->jumlah;
        $masuk->keterangan = $request->keterangan;
        $masuk->tanggal = $request->tanggal;
        $masuk->save();

        return redirect('/dashboard/keluar')->with('status', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Keluar $keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluar $keluar)
    {
        $keluar = DB::table('keluars')->where('id',$keluar->id)->first();
        return view('backend/keuangan/keluar/edit', ['keluar' => $keluar]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluar $keluar)
    {
        $request->validate([
            'jumlah' => ['required'],
            'keterangan' => ['required'],
            'tanggal' => ['required'],

        ]);

        Keluar::where('id', $keluar->id)->update([
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);
        return back()->with('status', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Keluar  $keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluar $keluar)
    {
        Keluar::destroy($keluar->id);
        return back()->with('status', 'Berhasil dihapus');
    }
}
