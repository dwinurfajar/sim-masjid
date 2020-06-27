<?php

namespace App\Http\Controllers;

use App\Keluar;
use App\Masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function index(){
    	$msk = DB::table('masuks')->sum('jumlah');
    	$masuk = DB::table('masuks')->get();
    	$keluar = DB::table('keluars')->sum('jumlah');
    	$saldo = $msk-$keluar;


        //dump($masuk);
        return view('backend/keuangan/saldo/saldo', [ 'saldo' => $saldo ], ['masuk' => $masuk ]);
    }
}
