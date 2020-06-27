<?php

namespace App\Http\Controllers;

use App\Jamaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//tambah ini dulu

class JamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jamaah = DB::table('jamaahs')->get();
        return view('backend/jamaah/jamaah', ['jamaah' => $jamaah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/jamaah/create');
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
            'jenisKelamin' => 'required',
            'telephone' => 'required',
            'alamat' => 'required',
            'latt' => 'required',
            'long' => 'required',
        ]);

        $jamaah = new Jamaah;
        $jamaah->nama = $request->nama;
        $jamaah->jenisKelamin = $request->jenisKelamin;
        $jamaah->telephone = $request->telephone;
        $jamaah->alamat = $request->alamat;
        $jamaah->latt = $request->latt;
        $jamaah->long = $request->long;
        $jamaah->save();

        return redirect('/dashboard/jamaah')->with('status', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jamaah  $jamaah
     * @return \Illuminate\Http\Response
     */
    public function show(Jamaah $jamaah)
    {
        $jamaah = DB::table('jamaahs')->where('id', $jamaah->id)->first();
        return view('backend/jamaah/show', ['jamaah' => $jamaah]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jamaah  $jamaah
     * @return \Illuminate\Http\Response
     */
    public function edit(Jamaah $jamaah)
    {
        $jamaah = DB::table('jamaahs')->where('id', $jamaah->id)->first();
        return view('backend/jamaah/edit', ['jamaah' => $jamaah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jamaah  $jamaah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jamaah $jamaah)
    {
        $request->validate([
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'telephone' => 'required',
            'alamat' => 'required',
            'latt' => 'required',
            'long' => 'required',
        ]);

        Jamaah::where('id', $jamaah->id)->update([
            'nama' => $request->nama,
            'jenisKelamin' => $request->jenisKelamin,
            'telephone' => $request->telephone,
            'alamat' => $request->alamat,
            'latt' => $request->latt,
            'long' => $request->long,
            'aktif' => $request->aktif,
            'zakat' => $request->zakat,
        ]);
        return back()->with('status', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jamaah  $jamaah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jamaah $jamaah)
    {
        Jamaah::destroy($jamaah->id);
        return back()->with('status', 'Berhasil dihapus');
    }
    public function active()
    {

    }
}
