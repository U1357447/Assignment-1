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
        Session::flash('successfulalert', 'Thread has been created successfully.');
        return back();
    }

    public function editThread(Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    public function updateThread(Request $request, Thread $thread)
    {
        $thread->update($request->all());
        Session::flash('successfulalert', 'Thread has been updated successfully.');
        return back();
    }

    public function deleteThread(Thread $thread)
    {
        $thread->delete();
        Session::flash('dangeralert', 'Thread has been deleted.');
        return back();
    }
}
