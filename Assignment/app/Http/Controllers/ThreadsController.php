<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addThread(Request $request)
    {
        $this->validate($request, ['title' => 'required', 'content' => 'required']);
        $thread = new Thread;
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->user_id = Auth::user()->id;;

        $thread->save();

        return back();
    }

    public function editThread(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    public function updateThread(Request $request, Thread $thread)
    {
        $thread->update($request->all());
        return back();
    }

################################################################################

    public function addReply(Request $request, Thread $thread)
    {
        $this->validate($request, ['content' => 'required']);
        $reply = new Reply;
        $reply->content = $request->content;
        $reply->user_id = Auth::user()->id;

        $thread->replies()->save($reply);

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
        return back();
    }
}
