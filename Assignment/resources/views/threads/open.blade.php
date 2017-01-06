@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{$thread->title}}</h2>
                        <p>{{$thread->content}}</p>
                        <div class="pull-right">
                            <p>
                                created at: {{$thread->created_at}}</br>
                                updated at: {{$thread->updated_at}}
                            </p>
                        </div>
                    </div>
                    <div class="panel-body"><h3>Replies</h3></div>
                    @foreach ($thread->replies as $reply)
                        <div class="panel-body">
                            <p>{{$reply->content}}</p>
                            <div class="pull-right">
                                Created by: {{$reply->user->name}}<br/>
                                created at: {{$reply->created_at}}</br>
                                updated at: {{$reply->updated_at}}
                            </div>
                            <div class="pull-right"><a href="/threads/{{$thread->id}}/replies/{{$reply->id}}/edit" class="btn btn-primary">Edit Reply</a></div>
                        </div>
                    @endforeach
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Send a Reply</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="/threads/{{$thread->id}}/replies">
                            {{csrf_field()}}
                            <div class="form-group">
                                <textarea name="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
