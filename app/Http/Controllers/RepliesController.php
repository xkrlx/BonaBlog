<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Pages;
use App\Replies;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function index()
    {
        
    }

    public function store(CommentRequest $request, $comment_id)
    {
        $comment = Comment::Find($comment_id);
        $pages_id=$comment->pages_id;
        $page=Pages::Find($pages_id);
        $reply = new Replies();
        $reply->name = $request->name;
        $reply->comment = $request->comment;
        $reply->approved = true;
        $reply->comment_id = $comment_id;

        $reply->save();


        return redirect()->route('pages.show',[$page->id]);
    }

    public function destroy($id)
    {
        $reply = Replies::Find($id);

        $reply->delete();

        return redirect()->back();
    }
}
