<?php

namespace App\Http\Controllers;

use App\Models\repair_orders;
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
            return redirect('/');
        }
        else
        {
            return redirect('/addFixer')->with('errormessage', 'Jūs jau turitę tvarkytojo paskirą!');
        }
    }

    public function showStatus(){

        if (session('id_repairman') != null)
        {
            $statusData = repair_orders::select('*')
                ->where([
                    ['fk_repairmansid', '=', session('id_repairman')],
                    //TODO: reik padaryt kad tik rodytu tik nesutvarkytus o ne visus
                ])
                ->get();

//            $statusData = repair_orders::all();



            return view('/showStatus', ['statusData' => $statusData]);
        }
        else
        {
            return redirect('/');
        }

    }







}
