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

    public function showAddFixer(){
        return view('/addFixer');
    }

    public function addFixer(){
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            'specialization' => 'required',
            'description' => 'required',
            'photo_url' => 'required'
        ]);

        $repairmans = repairmans::select('*')
            ->where([
                ['fk_usersid', '=', session('id_user')],
            ])
            ->get();

        if ($repairmans->isEmpty())
        {
            $repairman = new repairmans();
            $repairman->name = request('name');
            $repairman->surname = request('surname');
            $repairman->phone_number = request('phone_number');
            $repairman->email = request('email');
            $repairman->city = request('city');
            $repairman->specialization = request('specialization');
            $repairman->description = request('description');
            $repairman->photo_url = request('photo_url');
            $repairman->fk_usersid = session('id_user');
            $repairman->save();
        }
        return redirect('/');
    }



}
