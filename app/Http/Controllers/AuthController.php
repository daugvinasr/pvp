<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('login');
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
    public function showRegister(){
        return view('register');
    }
}
