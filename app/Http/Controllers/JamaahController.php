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
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'latt' => 'required',
            'long' => 'required',
        ]);

        $jamaah = new Jamaah;
        $jamaah->name = $request->name;
        $jamaah->gender = $request->gender;
        $jamaah->phone = $request->phone;
        $jamaah->address = $request->address;
        $jamaah->latt = $request->latt;
        $jamaah->long = $request->long;
        $jamaah->save();

        return redirect('/dashboard/jamaah')->with('status', 'Succesfully');
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
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'latt' => 'required',
            'long' => 'required',
        ]);

        Jamaah::where('id', $jamaah->id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'latt' => $request->latt,
            'long' => $request->long,
        ]);
        return back()->with('status', 'Changed succesfully');
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
        return back()->with('status', 'Succes');
    }
}
