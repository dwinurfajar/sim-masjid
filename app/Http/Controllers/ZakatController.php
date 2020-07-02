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
    public function index(Request $request)
    {
   
        $zakat = Zakat::all();
        if($request->ajax()){
            return datatables()->of($zakat)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit badge badge-primary edit-post"><i class="far fa-edit"></i> Edit</a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<a href="javascript:void(0)" name="delete" id="'.$data->id.'" class="delete badge badge-danger"><i class="far fa-trash-alt"></i> Delete</a>';     
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }

        return view('backend/zakat/zakat');
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
         $id = $request->id;
        
        $post   =   Zakat::updateOrCreate(['id' => $id],
                    [
                        'nama' => $request->nama,
                        'jenisZakat' => $request->jenisZakat,
                        'jenisBayar' => $request->jenisBayar,
                        'jumlah' => $request->jumlah,
                        'tanggal' => $request->tanggal,
                    ]); 

        return response()->json($post);
        /*
        $request->validate([
            'nama' => 'required',
            'jenisZakat' => 'required',
            'jenisBayar' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        $masuk = new Zakat;
        $masuk->nama = $request->nama;
        $masuk->jenisZakat = $request->jenisZakat;
        $masuk->jenisBayar = $request->jenisBayar;
        $masuk->jumlah = $request->jumlah;
        $masuk->tanggal = $request->tanggal;
        $masuk->save();

        return back()->with('status', 'Berhasil');
        */
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
         $where = array('id' => $zakat->id);
        $post  = Zakat::where($where)->first();
     
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
        $post = Zakat::where('id',$zakat->id)->delete();
     
        return response()->json($post);
    }
}
