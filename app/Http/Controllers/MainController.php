<?php

namespace App\Http\Controllers;

use App\Models\news;

class MainController extends Controller
{
    public function showMain()
    {
        $data = news::select('*')->orderBy('date', 'desc')->limit(6)->get();
        return view('main', ['data' => $data]);
    }

    public function showFixers()
    {
        return view('fixers');
    }

    public function showLocations()
    {
        return view('locations');
    }

    public function showReadGuide()
    {
        return view('readguide');
    }
}
