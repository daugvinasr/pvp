<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\repair_orders;
use App\Models\repairmans_categories;
use App\Models\repairmans;
use Illuminate\Http\Request;

class repairmanController extends Controller
{
    public function showFixers()
    {
        $fixersData = repairmans::all();
        return view('/fixers', ['fixersData' => $fixersData]);
    }
    public function showFixerProfile($id)
    {
        $fixerData = repairmans::select('*')->where('repairmans_id', $id)->get();
        return view('/fixerProfile', ['fixerData' => $fixerData]);
    }

    public function showAddFixer()
    {
        $categories=categories::all();
        return view('/addFixer', ['categories' => $categories]);
    }

    public function addFixer()
    {

        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            'description' => 'required',
            'photo_url' => 'required',
            'categories_list' => 'required',
        ]);

        $repairmans = repairmans::select('*')
            ->where([
                ['fk_usersid', '=', session('id_user')],
            ])
            ->get();

        if ($repairmans->isEmpty()) {

            $repairman = new repairmans();
            $repairman->name = request('name');
            $repairman->surname = request('surname');
            $repairman->phone_number = request('phone_number');
            $repairman->email = request('email');
            $repairman->city = request('city');
            $repairman->description = request('description');
            $repairman->photo_url = request('photo_url');
            $repairman->fk_usersid = session('id_user');
            $repairman->save();

            $categoriesArray=request('categories_list');
            foreach($categoriesArray as $category){
                $repairmans_categories = new repairmans_categories();
                $repairmans_categories->fk_repairmansid = $repairman -> id;
                $repairmans_categories->fk_categoriesid = $category;
                $repairmans_categories->save();
            }
            return redirect('/');
        } else {
            return redirect('/addFixer')->with('errormessage', 'Jūs jau turitę tvarkytojo paskyrą!');
        }
    }
}
