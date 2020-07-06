<?php

namespace App\Http\Controllers;
use App\Jamaah;
use App\Keluar;
use App\Masuk;
use App\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        $jamaah = DB::table('jamaahs')->get();

        $month = date('m');
        $year = date('yy');
        $masuk = DB::table('masuks')->whereYear('tanggal', $year)->whereMonth('tanggal', $month)->orderBy('tanggal', 'asc')->get();
        $keluar = DB::table('keluars')->whereYear('tanggal', $year)->whereMonth('tanggal', $month)->orderBy('tanggal', 'asc')->get();

        $msk = DB::table('masuks')->sum('jumlah');
        $klr = DB::table('keluars')->sum('jumlah');
        $saldo = $msk - $klr;

        $zakat = DB::table('zakats')->whereYear('tanggal', $year)->orderBy('tanggal', 'desc')->get();
        $penerima = DB::table('jamaahs')->where('zakat', '1')->get();

        return view('frontend/index', compact('jamaah', 'masuk', 'keluar', 'saldo', 'zakat', 'penerima'));
    }
}
