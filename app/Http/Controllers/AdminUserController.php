<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')->get();
        return view('backend/user/user', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend/user/create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'admin' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('status', 'Succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id' , $id)->first();
        return view('backend/user/profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('backend/user/usersetting', ['user'=> $user]);
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
            return back()->with('status', 'Username changed succesfully');
        }elseif ($request->has('email')) {
            $validatedData = $request->validate([
                'email' => 'unique:users|required|email',  
            ]);
            User::where('id', $user->id)->update([
                    'email' => $request->email
                ]);
            return back()->with('status', 'Email changed succesfully');
        }elseif ($request->has('admin')) {
            $validatedData = $request->validate([
                'admin' => 'required',  
            ]);
            User::where('id', $user->id)->update([
                    'admin' => $request->admin
                ]);
            return back()->with('status', 'Role changed succesfully');
        }elseif ($request->has('password')) {
            $validatedData = $request->validate([
                'password' => 'required|min:8',  
            ]);
            User::where('id', $user->id)->update([
                    'password' => Hash::make($request->password)
                ]);
            return back()->with('status', 'Password changed succesfully');
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
        User::destroy($id);
        return back()->with('status', 'Succes');
    }
}
