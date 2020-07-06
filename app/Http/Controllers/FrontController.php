<?php

namespace App\Http\Controllers;
use App\Jamaah;
use App\Keluar;
use App\Masuk;
use App\Zakat;
use App\Kegiatan;
use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $jamaah = DB::table('jamaahs')->get();

        $masuk = DB::table('masuks')->whereYear('tanggal', date('yy'))->whereMonth('tanggal', date('m'))->orderBy('tanggal', 'asc')->get();
        $keluar = DB::table('keluars')->whereYear('tanggal', date('yy'))->whereMonth('tanggal', date('m'))->orderBy('tanggal', 'asc')->get();

        $msk = DB::table('masuks')->sum('jumlah');
        $klr = DB::table('keluars')->sum('jumlah');
        $saldo = $msk - $klr;

        $zakat = DB::table('zakats')->whereYear('tanggal', date('yy'))->orderBy('tanggal', 'desc')->get();
        $penerima = DB::table('jamaahs')->where('zakat', '1')->get();

        $kegiatan = DB::table('kegiatans')->whereDate('tanggal','>=', date('Y-m-d'))->get();

        $profil = DB::table('profils')->where('id', 1)->first();

        return view('frontend/index', compact('jamaah', 'masuk', 'keluar', 'saldo', 'zakat', 'penerima','kegiatan', 'profil'));
    }
}
