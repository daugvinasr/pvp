<?php

namespace App\Http\Controllers;

use App\Models\repair_orders;
use App\Models\repairmans;
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
        $user->role = 'user';
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
//                error_log($data[0]->users_id);
//                error_log($data[0]->username);
//                error_log($data[0]->role);
                Session::put('id_user', $data[0]->users_id);
                Session::put('username', $data[0]->username);
                Session::put('role', $data[0]->role);


                //checking if user is repairman
                $repairManData = repairmans::select('*')
                    ->where([
                        ['fk_usersid', '=', $data[0]->users_id]
                    ])
                    ->get();

                if(!$repairManData->isEmpty()){
                    Session::put("id_repairman", $repairManData[0]->repairmans_id);
                }

                 return redirect('/');
            }
        }
            return redirect('/login')->with('alert', 'Neteisingas slaptažodis');
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
    public function showRegister(){
        return view('register');
    }
}
