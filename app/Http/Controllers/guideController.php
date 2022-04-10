<?php

namespace App\Http\Controllers;

use App\Models\devices;
use App\Models\parts;
use App\Models\repair_guides;
use App\Models\repair_guides_parts;
use App\Models\steps;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class guideController extends Controller
{
    public function showGuides()
    {
        $guides = repair_guides::all();
        return view('guides', ['guides' => $guides]);
    }

    public function showGuide($id)
    {
        $guide = steps::where('fk_repair_guidesid', $id)->orderBy('step_number')->get();
//        if ($guide->isEmpty()) {
//            return redirect('/guides');
//        } else {
            $guideInfo = repair_guides::where('repair_guides_id', $id)->first();
            $partsInfo = repair_guides_parts::where('fk_repair_guidesid',$id)->get();
            return view('guide', ['guide' => $guide, 'guideInfo' => $guideInfo,'partsInfo' => $partsInfo]);


    }

    public function showAddGuide(){
        $devicesData = devices::all();
        return view('/addGuide', ['devicesData' => $devicesData]);
    }

    public function addGuide()
    {
        request()->validate([
            'title' => 'required',
            'time_required' => 'required',
            'difficulty' => 'required',
            'description' => 'required',
            'image_url' => 'required',
            'fk_devicesid' => 'required'
        ]);
            $guide = new repair_guides();
            $guide->title = request('title');
            $guide->difficulty = request('difficulty');
            $guide->time_required = request('time_required');
            $guide->description = request('description');
            $guide->image_url = request('image_url');
            $guide->fk_devicesid = request('fk_devicesid');
            $guide->fk_usersid = session('id_user');
            $guide->save();

            return redirect('/showGuide/'.$guide->id);
    }

    public function showAddStep(){
        return view('/addStep');
    }

    public function addStep($id)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required'
        ]);
        $number = steps::select('*')->where([['fk_repair_guidesid', '=', $id]])->orderBy('step_number', 'desc')->first();

        $step = new steps();
        $step->title = request('title');
        $step->description = request('description');
        $step->image_url = request('image_url');
        $step->step_number = $number->step_number+1;
        $step->fk_repair_guidesid=$id;
        $step->save();

        return redirect('/showGuide/'.$id);
    }
}
