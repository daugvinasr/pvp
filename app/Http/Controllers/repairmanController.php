<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\comments;
use App\Models\fixer_comments;
use App\Models\repair_orders;
use App\Models\repairmans_categories;
use App\Models\repairmans;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $ordercount = repair_orders::select('*')->where([['fk_repairmansid', $id], ['status', 3]])->count();
        $commentcount = fixer_comments::select('*')->where([['fk_repairmans_id', $id]])->count();
        $rating = fixer_comments::select('rating')->where([['fk_repairmans_id', $id]])->avg('rating');
        return view('/fixerProfile', ['fixerData' => $fixerData, 'ordercount' => $ordercount, 'commentcount' => $commentcount, 'rating' => floor($rating)]);
    }

    public function showFixerProfileEdit($id)
    {
        $fixerData = repairmans::select('*')->where('repairmans_id', $id)->get();
        $categories = categories::all();
        return view('/fixerProfileEdit', ['fixerData' => $fixerData, 'categories' => $categories]);
    }

    public function showFixerApprovalForm($id)
    {
        return view('/fixerApprovalForm');
    }

    public function approveFixer($id)
    {
        request()->validate([
            'address' => 'required',
            'zipcode' => 'required|digits:5',
//            'idnumber' => 'required|digits:11|starts_with:1,2,3,4,5,6'
        ]);

        $repairman = repairmans::where('repairmans_id', $id);
        $repairman->update(['approved' => 2]);

        return redirect("/fixerProfile/$id");
    }

    public function showAddFixer()
    {
        $categories = categories::all();
        return view('/addFixer', ['categories' => $categories]);
    }

    public function addEditedFixer($id)
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
            'description' => 'required',
            'photo_url' => 'required',
            'categories_list' => 'required'
        ]);

        $repairman = repairmans::where('repairmans_id', $id);
        $repairman->update(['name' => request('name')]);
        $repairman->update(['surname' => request('surname')]);
        $repairman->update(['email' => request('email')]);
        $repairman->update(['city' => request('city')]);
        $repairman->update(['phone_number' => request('phone_number')]);
        $repairman->update(['description' => request('description')]);
        $repairman->update(['photo_url' => request('photo_url')]);

        $categoriesArray = request('categories_list');

        //delete categories associated with repairmans_id
        repairmans_categories::where('fk_repairmansid', $id)->delete();

        //foreatch categories_list and insert into repairmans_categories
        foreach ($categoriesArray as $category) {
            $repairmans_categories = new repairmans_categories();
            $repairmans_categories->fk_repairmansid = $id;
            $repairmans_categories->fk_categoriesid = $category;
            $repairmans_categories->save();
        }
        return redirect('/fixers');

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
            $status = users::where('users_id', $repairman->fk_usersid);
            $status->update(['role' => 'fixer']);
            $repairman->save();

            $categoriesArray = request('categories_list');
            foreach ($categoriesArray as $category) {
                $repairmans_categories = new repairmans_categories();
                $repairmans_categories->fk_repairmansid = $repairman->id;
                $repairmans_categories->fk_categoriesid = $category;
                $repairmans_categories->save();
            }

            Session::put('id_repairman', $repairman->id);
            return redirect('/fixerProfile/' . $repairman->id);
        } else {
            return redirect('/addFixer')->with('errormessage', 'J??s jau turite tvarkytojo paskyr??!');
        }
    }

    public function showNotApproved()
    {
        $fixersData = repairmans::where('approved', 2)->get();
        return view('/showNotApproved', ['fixersData' => $fixersData]);
    }

    public function approveNotApproved($id)
    {
        $repairman = repairmans::where('repairmans_id', $id);
        $repairman->update(['approved' => 1]);
        return redirect('/showNotApproved');
    }

}
