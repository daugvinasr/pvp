<?php

namespace App\Http\Controllers;

use App\Models\repair_guides;
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
        if ($guide->isEmpty()) {
            return redirect('/guides');
        } else {
            $guideInfo = repair_guides::where('repair_guides_id', $id)->first();
            return view('guide', ['guide' => $guide, 'guideInfo' => $guideInfo]);
        }

    }
}
