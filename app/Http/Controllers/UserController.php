<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    public function setting()
    {
        $user = Auth::user();
        return view('backend/user/setting', compact('user'));
    }

    public function changePassword(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(Auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('status', 'Password berhasil diubah');
    }

    public function uploadAvatar(Request $request){
        $validatedData = $request->validate([
            'avatar' => 'image|required|max:1024',
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('uploads/avatars', $user->email);
            $user->avatar = $user->email;
            $user->save();
        } 
        return back()->with('status', 'Berhasil diunggah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        return view('backend/user/profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend/user/setting');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->has('name')){
            $validatedData = $request->validate([
                'name' => 'unique:users|required|max:255',
            ]);
            User::where('id', $user->id)->update([
                    'name' => $request->name
                ]);
            return back()->with('status', 'Username berhasil diubah');
        }elseif ($request->has('email')) {
            $validatedData = $request->validate([
                'email' => 'unique:users|required|email',  
            ]);
            User::where('id', $user->id)->update([
                    'email' => $request->email
                ]);
            return back()->with('status', 'Email berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
