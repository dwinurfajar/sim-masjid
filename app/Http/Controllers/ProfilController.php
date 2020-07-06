<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = DB::table('profils')->where('id', 1)->first();
        return view('backend/profil/profil', compact('profil'));
    }

    public function uploadFoto(Request $request){
        


        if($request->hasFile('foto_ketua')){
            
            $request->file('foto_ketua')->move('uploads/avatars', 'foto_ketua');
            Profil::where('id', 1)->update([
                'foto_ketua' => 'foto_ketua',
            ]);
            return back()->with('status', 'Berhasil diunggah');
        }
        elseif($request->hasFile('foto_sekretaris')){
            
            $request->file('foto_sekretaris')->move('uploads/avatars', 'foto_sekretaris');
            Profil::where('id', 1)->update([
                'foto_sekretaris' => 'foto_sekretaris',
            ]);
            return back()->with('status', 'Berhasil diunggah');
        }
        elseif($request->hasFile('foto_bendahara')){
            
            $request->file('foto_bendahara')->move('uploads/avatars', 'foto_bendahara');
            Profil::where('id', 1)->update([
                'foto_bendahara' => 'foto_bendahara',
            ]);
            return back()->with('status', 'Berhasil diunggah');
        }
        return back();
        
    }
    public function update(Request $request){
        if($request->has('ketua')){
            Profil::where('id', 1)->update([
                'ketua' => $request->ketua,
            ]);
            return back()->with('status', 'Berhasil diubah');
        }
        elseif($request->has('sekretaris')){
            Profil::where('id', 1)->update([
                'sekretaris' => $request->sekretaris,
            ]);
            return back()->with('status', 'Berhasil diubah');
        }
        elseif($request->has('bendahara')){
            Profil::where('id', 1)->update([
                'bendahara' => $request->bendahara,
            ]);
            return back()->with('status', 'Berhasil diubah');
        }
        return back();
    }
}
