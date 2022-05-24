<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\comments;
use App\Models\devices;
use App\Models\parts;
use App\Models\repair_guides;
use App\Models\repair_guides_parts;
use App\Models\steps;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class guideController extends Controller
{
    public function showCategories()
    {
        $categories = categories::all();
        return view('categories', ['categories' => $categories]);
    }

    public function showDevices($id)
    {
        $devices = devices::where('fk_categoriesid', $id)->get();
        $temp=$id;
        return view('devices', ['devices' => $devices],['temp' => $temp]);
    }

    public function showGuides($id)
    {
        $guides = repair_guides::where('fk_devicesid', $id)->get();
        $temp = $id;
        $atgal=devices::select('fk_categoriesid')->where('devices_id',$id)->first();
        $atgal=$atgal->fk_categoriesid;
        return view('guides', ['guides' => $guides,'temp' => $temp,'atgal'=> $atgal]);
    }

    public function showGuide($id)
    {
        $guide = steps::where('fk_repair_guidesid', $id)->orderBy('step_number')->get();
//        if ($guide->isEmpty()) {
//            return redirect('/guides');
//        } else {
        $commentsAmount = comments::where('fk_repair_guidesid', $id)->count();
        $guideInfo = repair_guides::where('repair_guides_id', $id)->first();
        $partsInfo = repair_guides_parts::where('fk_repair_guidesid', $id)->get();
        return view('guide', ['guide' => $guide, 'guideInfo' => $guideInfo, 'partsInfo' => $partsInfo], ['id' => $id, 'commentsAmount' => $commentsAmount]);


    }

    public function showAddGuide()
    {
        return view('/addGuide');
    }

    public function addGuide($id)
    {
        request()->validate([
            'title' => 'required',
            'time_required' => 'required',
            'difficulty' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ]);
        $guide = new repair_guides();
        $guide->title = request('title');
        $guide->difficulty = request('difficulty');
        $guide->time_required = request('time_required');
        $guide->description = request('description');
        $guide->image_url = request('image_url');
        $guide->fk_devicesid = $id;
        $guide->fk_usersid = session('id_user');
        $guide->save();

        return redirect('/showGuide/' . $guide->id);
    }

    public function showAddStep()
    {
        return view('/addStep');
    }

    public function addStep($id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ]);
        $number = steps::select('step_number')->where([['fk_repair_guidesid', '=', $id]])->orderBy('step_number', 'desc')->first();
        if ($number == null) {
            $number = 0;
        } else {
            $number = $number->step_number;
        }
        $step = new steps();
        $step->title = request('title');
        $step->description = request('description');
        $step->image_url = request('image_url');
        $step->step_number = $number + 1;
        $step->fk_repair_guidesid = $id;
        $step->save();

        return redirect('/showGuide/' . $id);
    }
    public function showEditGuide($id)
    {
        $guide = repair_guides::where('repair_guides_id', $id)->first();
        return view('editGuide', ['guide' => $guide]);
    }

    public function editGuide($id)
    {
        request()->validate([
            'title' => 'required',
            'difficulty' => 'required',
            'image_url' => 'required',
            'time_required' => 'required',
            'description' => 'required'
        ]);


        $guide = repair_guides::where('repair_guides_id', $id);
        $gidas = repair_guides::where('repair_guides_id', $id)->first();
        $guide->update(['title' => request('title')]);
        $guide->update(['difficulty' => request('difficulty')]);
        $guide->update(['time_required' => request('time_required')]);
        $guide->update(['image_url' => request('image_url')]);
        $guide->update(['description' => request('description')]);
        return redirect('/showGuide/' . $gidas->repair_guides_id);
    }
    public function showEditStep($id)
    {
        $step = steps::where('step_id', $id)->first();
        return view('editStep', ['step' => $step]);
    }

    public function editStep($id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ]);

        $step = steps::where('step_id', $id);
        $temp = steps::where('step_id', $id)->first();
        $step->update(['title' => request('title')]);
        $step->update(['image_url' => request('image_url')]);
        $step->update(['description' => request('description')]);
        return redirect('/showGuide/' . $temp->fk_repair_guidesid);
    }
    public function removeStep($id)
    {
        $step = steps::where('step_id', $id);
        $temp = steps::where('step_id', $id)->first();
        $step->delete();
        return redirect('/showGuide/' . $temp->fk_repair_guidesid);
    }

    public function showAddCategories()
    {
        return view('/addCategories');
    }

    public function addCategories()
    {
        request()->validate([
            'name' => 'required',
            'photo_url' => 'required'
        ]);
        $categorie = new categories();
        $categorie->name = request('name');
        $categorie->photo_url = request('photo_url');
        $categorie->save();

        return redirect('/categories');
    }

    public function showAddDevice()
    {
        return view('/addDevice');
    }

    public function addDevice($id)
    {
        request()->validate([
            'name' => 'required',
            'specifications' => 'required',
            'photo_url' => 'required'
        ]);
        $device = new devices();
        $device->name = request('name');
        $device->specifications = request('specifications');
        $device->photo_url = request('photo_url');
        $device->fk_categoriesid  = $id;
        $device->save();

        return redirect('/devices/' . $id);
    }
}
