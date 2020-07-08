<?php

namespace App\Http\Controllers;

use App\Keluar;
use App\Masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function index(){

      $month = date('m');
      $year = date('yy');

    	$masuk = DB::table('masuks')->whereYear('tanggal', $year)->whereMonth('tanggal', $month)->orderBy('tanggal', 'asc')->get();
    	$keluar = DB::table('keluars')->whereYear('tanggal', $year)->whereMonth('tanggal', $month)->orderBy('tanggal', 'asc')->get();
        $msk = DB::table('masuks')->sum('jumlah');
        $klr = DB::table('keluars')->sum('jumlah');
        $saldo = $msk - $klr;

        //dump($masuk, $keluar);
      return view('backend/keuangan/saldo/saldo', compact('masuk','keluar','saldo'));
    }

    public function filter(Request $request){

        $msk = DB::table('masuks')->sum('jumlah');
        $klr = DB::table('keluars')->sum('jumlah');
        $saldo = $msk - $klr;

        if(($request->tahun != null )&&($request->bulan == null)){
            $masuk = DB::table('masuks')->whereYear('tanggal' , $request->tahun)->orderBy('tanggal', 'desc')->get();
            $keluar = DB::table('keluars')->whereYear('tanggal' , $request->tahun)->orderBy('tanggal', 'desc')->get();
            return view('backend/keuangan/saldo/saldo', compact('masuk', 'keluar', 'saldo'));
        }
        elseif(($request->bulan != null )&&($request->tahun == null)){
            $masuk = DB::table('masuks')->whereMonth('tanggal' , $request->bulan)->orderBy('tanggal', 'desc')->get();
            $keluar = DB::table('keluars')->whereMonth('tanggal' , $request->bulan)->orderBy('tanggal', 'desc')->get();
            return view('backend/keuangan/saldo/saldo', compact('masuk', 'keluar', 'saldo'));
        }
        elseif(($request->bulan != null )&&($request->tahun != null)){
            $masuk = DB::table('masuks')->whereYear('tanggal', $request->tahun)->whereMonth('tanggal' , $request->bulan)->orderBy('tanggal', 'desc')->get();
            $keluar = DB::table('keluars')->whereYear('tanggal', $request->tahun)->whereMonth('tanggal' , $request->bulan)->orderBy('tanggal', 'desc')->get();

            return view('backend/keuangan/saldo/saldo', compact('masuk', 'keluar','saldo'));
        }
        else{
            $month = date('m');
            $masuk = DB::table('masuks')->whereMonth('tanggal', $month)->orderBy('tanggal', 'desc')->get();
            $keluar = DB::table('keluars')->whereMonth('tanggal', $month)->orderBy('tanggal', 'desc')->get();
            return view('backend/keuangan/saldo/saldo', compact('masuk', 'keluar','saldo'));
        }
        
    }

}
