<?php

namespace App\Http\Controllers;

use App\KMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = DB::table('k_masuks')->orderBy('tanggal', 'desc')->get();
        return view('backend/keuangan/masuk/masuk', ['masuk' => $masuk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/keuangan/masuk/create');
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
            'sumber' => 'required',
            'tanggal' => 'required',
        ]);

        $masuk = new KMasuk;
        $masuk->jumlah = $request->jumlah;
        $masuk->keterangan = $request->keterangan;
        $masuk->sumber = $request->sumber;
        $masuk->tanggal = $request->tanggal;
        $masuk->save();

        return redirect('/dashboard/masuk')->with('status', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KMasuk  $kMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $masuk = DB::table('k_masuks')->where('id',$kMasuk->id)->first();
        dump($request->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KMasuk  $kMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(KMasuk $kMasuk)
    {
        $masuk = DB::table('k_masuks')->where('id',$kMasuk->id)->first();
        dump($masuk);
        //return view('backend/keuangan/masuk/edit', ['masuk' => $masuk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KMasuk  $kMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KMasuk $kMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KMasuk  $kMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KMasuk $kMasuk)
    {
        KMasuk::destroy($kMasuk->id);
        return back()->with('status', 'Berhasil dihapus');
    }
}
