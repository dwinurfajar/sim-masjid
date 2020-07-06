<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $kegiatan = DB::table('kegiatans')->whereDate('tanggal','>=', date('Y-m-d'))->get();
        return view('backend/kegiatan/kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/kegiatan/create');
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
            'nama' => 'required',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'pukul' => 'required',
            'tanggal' => 'required',
        ]);

        $masuk = new Kegiatan;
        $masuk->nama = $request->nama;
        $masuk->deskripsi = $request->deskripsi;
        $masuk->tempat = $request->tempat;
        $masuk->pukul = $request->pukul;
        $masuk->tanggal = $request->tanggal;
        $masuk->save();

        return redirect('/dashboard/kegiatan')->with('status', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        $kegiatan = DB::table('kegiatans')->where('id',$kegiatan->id)->first();
        return view('backend/kegiatan/edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'pukul' => 'required',
            'tanggal' => 'required',
        ]);
        Kegiatan::where('id', $kegiatan->id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tempat' => $request->tempat,
            'pukul' => $request->pukul,
            'tanggal' => $request->tanggal,
        ]);
        return back()->with('status', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id);
        return back()->with('status', 'Berhasil dihapus');
    }
}
