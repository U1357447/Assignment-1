<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

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
        Session::flash('successalert', 'Thread has been created successfully.');
        return back();
    }

    public function editThread(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    public function updateThread(Request $request, Thread $thread)
    {
        $thread->update($request->all());
        Session::flash('successalert', 'Thread has been updated successfully.');
        return back();
    }

    public function deleteThread(Thread $thread)
    {
        $thread->delete();
        Session::flash('dangeralert', 'Thread has been deleted.');
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
        Session::flash('successalert', 'Reply has been added to the thread.');
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
        Session::flash('successalert', 'Reply has been successfully updated.');
        return back();
    }

    public function deleteReply(Thread $thread, Reply $reply)
    {
        $reply->delete();
        Session::flash('dangeralert', 'Reply has been deleted.');
        return back();
    }
}
