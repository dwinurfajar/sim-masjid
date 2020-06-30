<?php

namespace App\Http\Controllers;

use App\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class ZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend/zakat/ajax');
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
        $input = $request->all();

        return response()->json(['success'=>'Got Simple Ajax Request.']);
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
        $where = array('id' => $id);
        $post  = Pegawai::where($where)->first();
     
        return response()->json($post);
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
        $post = Pegawai::where('id',$id)->delete();
     
        return response()->json($post);
    }
}
