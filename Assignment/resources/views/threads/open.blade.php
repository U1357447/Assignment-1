@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Threads</div>
                        <div class="panel-body">
                            <h2>{{$thread->title}}</h2>
                            <p>{{$thread->content}}</p>
                            <div class="pull-right">
                                created at: {{$thread->created_at}}</br>
                                updated at: {{$thread->updated_at}}
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
