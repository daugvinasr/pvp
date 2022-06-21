<?php

namespace App\Http\Controllers;

use App\Models\users;
use App\Models\editors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class editorController extends Controller
{
    public function showAddEditor()
    {
        return view('/addEditor');
    }

    public function addEditor()
    {
        request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'phone_number' => 'required',
            'description' => 'required'
        ]);

        $editor = new editors();
        $editor->name = request('name');
        $editor->surname = request('surname');
        $editor->phone_number = request('phone_number');
        $editor->description = request('description');
        $editor->fk_usersid = session('id_user');
        $editor->save();

        return redirect('categories');
    }

    public function showPendingEditors()
    {
        $editorsData = editors::where('approved', 0)->get();
        return view('/showPendingEditors', ['editorsData' => $editorsData]);
    }

    public function approvePendingEditor($id)
    {
        $editor = editors::where('editors_id', $id);
        $editor->update(['approved' => 1]);
        $editor = editors::where('editors_id', $id)->first();
        $status = users::where('users_id', $editor->fk_usersid); // fuck you @laraveldev vos nenumiriau
        $status->update(['role' => 'editor']);
        return redirect('/showPendingEditors');
    }
}
