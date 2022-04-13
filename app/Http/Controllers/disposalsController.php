<?php

namespace App\Http\Controllers;

use App\Models\disposals;
use Illuminate\Http\Request;

class disposalsController extends Controller
{
    public function showDisposals()
    {
        $disposals = disposals::all();
        return view('locations', ['disposals' => $disposals]);
    }
}
