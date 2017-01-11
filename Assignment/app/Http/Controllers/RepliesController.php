<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class RepliesController extends Controller
{
    public function addReply(Request $request, Thread $thread)
    {
        $this->validate($request, ['content' => 'required']);
        $reply = new Reply;
        $reply->content = $request->content;
        $reply->user_id = Auth::user()->id;

        $thread->replies()->save($reply);
        Session::flash('successfulalert', 'Reply has been added successfully.');
        return back();
    }

    public function editReply(Thread $thread, Reply $reply)
    {
        return view('replies.edit', compact('reply', 'thread'));
    }

    public function updateReply(Request $request, Thread $thread, Reply $reply)
    {
        $this->validate($request, ['content' => 'required']);
        $reply->update($request->all());
        Session::flash('successfulalert', 'Reply has been updated successfully.');
        return back();
    }

    public function deleteReply(Thread $thread, Reply $reply)
    {
        $reply->delete();
        Session::flash('dangeralert', 'Reply has been deleted.');
        return back();
    }
}
