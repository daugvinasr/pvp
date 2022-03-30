<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\users;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }
    public function addUser(){
        request()->validate([
            'username' => 'required|max:254|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:254'
        ]);

        $user = new users();
        $user->username = request('username');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->save();
        return redirect('/login');
    }
    public function signIn(){
        request()->validate([
            'username' => 'required|max:254|exists:users'
        ]);

        $data = users::select('*')->where([['username','=',request('username')]])->get();
        if (!$data->isEmpty() && Hash::check(request('password'), $data[0]->password)) {
            if (count($data) > 0) {
                Session::put('id_user', $data[0]->id);
                Session::put('username', $data[0]->username);
                 return redirect('/');
            }
        }
        else{
            return redirect('/login')->with('alert', 'Neteisingas slaptažodis');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
    public function showRegister(){
        return view('register');
    }
}
