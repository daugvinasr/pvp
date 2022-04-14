<?php

namespace App\Http\Controllers;

use App\Models\parts;
use Illuminate\Http\Request;

class partsController extends Controller
{
    public function showParts()
    {
        $parts = parts::where('type', 'part')->get();
        $tools = parts::where('type', 'tool')->get();
        return view('showParts', ['parts' => $parts], ['tools' => $tools]);
    }

}
