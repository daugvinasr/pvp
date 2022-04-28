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

    public function showAddPart()
    {
        return view('addPart');
    }

    public function addPart()
    {
        request()->validate([
            'title' => 'required',
            'photoUrl' => 'URL',
            'url' => 'URL',
            'type' => 'required',
        ]);

        $part = new parts();
        $part->name = request('title');
        $part->url = request('url');
        $part->picture = request('photoUrl');
        $part->type = request('type');
        $part->save();
        return redirect('showParts');
    }

    public function showEditPart($id)
    {
        $part = parts::where('parts_id', $id)->first();
        return view('editPart', ['part' => $part]);
    }

    public function editPart($id)
    {
        request()->validate([
            'title' => 'required',
            'photoUrl' => 'URL',
            'url' => 'URL',
            'type' => 'required',
        ]);

        $part = parts::where('parts_id', $id);
        $part->update(['name' => request('title')]);
        $part->update(['url' => request('url')]);
        $part->update(['picture' => request('photoUrl')]);
        return redirect('showParts');
    }

}
