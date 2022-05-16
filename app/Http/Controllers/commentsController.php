<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\fixer_comments;
use Illuminate\Http\Request;

class commentsController extends Controller
{
    public static function showComments($id)
    {
        $comments = comments::where('fk_repair_guidesid', $id)->join('users', 'fk_usersid', '=', 'users_id')->get();
        return view('showComments', ['comments' => $comments]);
    }

    public static function addComment($id)
    {
        request()->validate([
            'body' => 'required',
        ]);
        $comment = new comments();
        $comment->fk_repair_guidesid = $id;
        $comment->fk_usersid = session('id_user');
        $comment->timestamp = date('Y-m-d H:i:s');
        $comment->content = request('body');
        $comment->save();
        return redirect('/showGuide/' . $id);
    }

    public static function showFixerComments($id)
    {
        $comments = fixer_comments::where('fk_repairmans_id', $id)->join('users', 'fk_usersid', '=', 'users_id')->get();
        return view('showFixerComments', ['comments' => $comments]);
    }

    public static function addFixerComment($id)
    {
        request()->validate([
            'body' => 'required',
        ]);
        $comment = new fixer_comments();
        $comment->fk_repairmans_id = $id;
        $comment->fk_usersid = session('id_user');
        $comment->timestamp = date('Y-m-d H:i:s');
        $comment->content = request('body');
        $comment->save();
        return redirect('/fixerProfile/' . $id);
    }

}
