<?php

namespace App\Http\Controllers;

use App\Models\repairmans;
use Illuminate\Http\Request;

class repairmanController extends Controller
{
    public function showFixers(){
        $fixersData = repairmans::all();
        return view('/fixers', ['fixersData' => $fixersData]);
    }
}
