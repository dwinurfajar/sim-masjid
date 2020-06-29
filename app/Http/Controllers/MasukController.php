<?php

namespace App\Http\Controllers;

use App\Masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = date('m');
        $msuk = DB::table('masuks')->whereMonth('tanggal', $month)->orderBy('tanggal', 'desc')->get();
        $masuk = DB::table('masuks')->orderBy('tanggal', 'desc')->get();
        return view('backend/keuangan/masuk/masuk', compact('masuk', 'msuk'));
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

        $masuk = new Masuk;
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
     * @param  \App\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Masuk $masuk)
    {
        $masuk = DB::table('masuks')->where('id',$masuk->id)->first();
        dump($masuk->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Masuk $masuk)
    {
        $masuk = DB::table('masuks')->where('id',$masuk->id)->first();
        //dump($masuk);
        return view('backend/keuangan/masuk/edit', ['masuk' => $masuk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masuk $masuk)
    {
        $request->validate([
            'jumlah' => ['required'],
            'keterangan' => ['required'],
            'sumber' => ['required'],
            'tanggal' => ['required'],

        ]);

        Masuk::where('id', $masuk->id)->update([
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'sumber' => $request->sumber,
            'tanggal' => $request->tanggal,
        ]);
        return back()->with('status', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masuk  $masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masuk $masuk)
    {
        Masuk::destroy($masuk->id);
        return back()->with('status', 'Berhasil dihapus');
    }
}
