<?php

namespace App\Http\Controllers;

use App\Thread;
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
}
