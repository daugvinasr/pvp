<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\fixer_comments;
use App\Models\repair_orders;
use Illuminate\Http\Request;

class commentsController extends Controller
{
    public static function showComments($id)
    {
        $comments = comments::where('fk_repair_guidesid', $id)->join('users', 'fk_usersid', '=', 'users_id')->get();
        return view('showComments', ['comments' => $comments], ['id' => $id]);
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
        $ordersInfo = repair_orders::where([['fk_usersid', session('id_user')], ['fk_repairmansid', $id]])->get();
        return view('showFixerComments', ['comments' => $comments, 'ordersInfo' => $ordersInfo, 'id' => $id]);
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
        $comment->rating = request('rating');
        $comment->save();
        return redirect('/showFixerComments/' . $id);
    }

}
