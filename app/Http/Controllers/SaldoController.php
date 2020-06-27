<?php

namespace App\Http\Controllers;

use App\Keluar;
use App\Masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaldoController extends Controller
{
    public function index(){
    	$masuk = DB::table('masuks')->sum('jumlah');
    	$keluar = DB::table('keluars')->sum('jumlah');
    	$saldo = $masuk-$keluar;
    	return view('backend/keuangan/saldo/saldo', ['saldo' => $saldo]);
    }
}
