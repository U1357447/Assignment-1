@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Threads</div>

                        @foreach($threads as $thread)                            
                            <div class="panel-body">
                                <a href="{{$thread->path()}}"><h2>{{$thread->title}}</h2></a>
                                <p>{{$thread->content}}</p>
                                <div class="pull-right">

                                    Created at: {{$thread->created_at}}</br>
                                    Updated at: {{$thread->updated_at}}
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
