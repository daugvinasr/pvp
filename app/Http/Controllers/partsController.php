<?php

namespace App\Http\Controllers;

use App\Models\parts;
use Illuminate\Http\Request;

class partsController extends Controller
{
    public function showParts()
    {
        $parts = parts::where('type', 'part')->get();
        return view('showParts', ['parts' => $parts]);
    }

    public function showTools()
    {
        $parts = parts::where('type', 'tool')->get();
        return view('showParts', ['parts' => $parts]);
    }

}
