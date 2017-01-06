<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function index()
    {
        $threads = Thread::all();
        return view('threads.index', compact('threads'));
    }

    public function open(Thread $thread)
    {
        return view('threads.open', compact('thread'));
    }

    public function addReply(Request $request, Thread $thread)
    {
        $reply = new Reply;
        $reply->content = $request->content;
        $reply->user_id = '1';

        $thread->replies()->save($reply);

        return back();
    }

    public function editReply(Thread $thread, Reply $reply)
    {
        return view('replies.edit', compact('reply', 'thread'));
    }

    public function updateReply(Request $request, Thread $thread, Reply $reply)
    {
        $reply->update($request->all());
        return back();
    }
}
