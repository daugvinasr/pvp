<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function showProfile($id)
    {
        $userData = users::select('email', 'username', 'role')->where('users_id', $id)->first();
        return view('/profile', ['userData' => $userData]);
    }
}
