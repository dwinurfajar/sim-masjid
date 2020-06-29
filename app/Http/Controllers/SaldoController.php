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

    	$msk = DB::table('masuks')->sum('jumlah');
    	$klr = DB::table('keluars')->sum('jumlah');
    	$saldo = $msk-$klr;

    	$masuk = DB::table('masuks')->select('jumlah', 'tanggal')->whereMonth('tanggal', $month)->orderBy('tanggal', 'asc')->get();
    	$keluar = DB::table('keluars')->select('jumlah', 'tanggal')->whereMonth('tanggal', $month)->orderBy('tanggal', 'asc')->get();

    	//$masuk = json_encode($masuk);
        //dump($masuk);
        return view('backend/keuangan/saldo/saldo', compact('saldo', 'masuk', 'msk','keluar', 'klr'));
    }
}
