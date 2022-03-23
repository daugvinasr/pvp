<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showMain(){

        return view('main');
    }
    public function showGuides(){

        return view('guides');
    }
    public function showFixers(){

        return view('fixers');
    }
    public function showLocations(){

        return view('locations');
    }
}
