<?php

namespace App\Http\Controllers;

use App\Zakat;
use App\Jamaah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $year = date('yy');
        $penerima = DB::table('jamaahs')->where('zakat', '1')->get();
        $zakat = DB::table('zakats')->whereYear('tanggal', $year)->orderBy('tanggal', 'desc')->get();

        //dump($j_penerima);
        return view('backend/zakat/zakat', compact('zakat','penerima'));
    }
    public function filter(Request $request){
        $penerima = DB::table('jamaahs')->where('zakat', '1')->get();
   

        $zakat = DB::table('zakats')->whereYear('tanggal', $request->tahun)->orderBy('tanggal', 'desc')->get();
        //dump($zakat);
        return view('backend/zakat/zakat', compact('zakat', 'penerima'));
        
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

        $request->validate([
            'nama' => 'required',
            'jenisZakat' => 'required',
            'tunai' => 'required_without:beras',
            'beras' => 'required_without:tunai',
            'tanggal' => 'required',
        ]);

        $masuk = new Zakat;
        $masuk->nama = $request->nama;
        $masuk->jenisZakat = $request->jenisZakat;
        $masuk->tunai = $request->tunai;
        $masuk->beras = $request->beras;
        $masuk->tanggal = $request->tanggal;
        $masuk->save();

        return back()->with('status', 'Berhasil');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function show(Zakat $zakat)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Zakat $zakat)
    {
        $zakat = DB::table('zakats')->where('id', $zakat->id)->first();
        //dump($zakat);
        return view('backend/zakat/edit', compact('zakat'));
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

        $request->validate([
            'nama' => 'required',
            'jenisZakat' => 'required',
            'tunai' => 'required_without:beras',
            'beras' => 'required_without:tunai',
            'tanggal' => 'required',
        ]);

        Zakat::where('id', $zakat->id)->update([
            'nama' => $request->nama,
            'jenisZakat' => $request->jenisZakat,
            'tunai' => $request->tunai,
            'beras' => $request->beras,
            'tanggal' => $request->tanggal,
        ]);
        return back()->with('status', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zakat  $zakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zakat $zakat)
    {
        Zakat::destroy($zakat->id);
        return back()->with('status', 'Berhasil dihapus');
    }
}
