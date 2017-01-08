@extends('layouts.app')

@section('addform')
    @if(Auth::check())
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
            @if(count($errors))
                @foreach($errors->all() as $error)
                    <div class="panel-body">
                        <div class="alert alert-danger" role="alert">
                            <p>Please enter a reply!</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
@endsection

@section('panelheader')
    <h2>{{$thread->title}}</h2>
    <p>{{$thread->content}}</p>

    <div class="pull-right">
        Created by: {{$thread->user->name}}<br/>
        Created at: {{$thread->created_at}}</br>
        Updated at: {{$thread->updated_at}}
    </div>
@endsection

@section('panelbody')
    <div class="panel-body"><h3>Replies</h3></div><hr/>

    @if (!count($thread->replies))
        <!-- If there are no replies -->
        <div class="panel-body">
            <div class="alert alert-danger" role="alert">
                <p>No replies have been added to this thread yet.</p>
            </div>
        </div>
    @endif

    @foreach ($thread->replies as $reply)
        <div class="panel-body">
            <div class="col-md-9">
                {{$reply->content}}
            </div>
            <div class="col-md-3">
                @if(Auth::id() == $reply->user_id)
                    <a href="/threads/{{$thread->id}}/replies/{{$reply->id}}/edit" class="btn btn-primary">&#160;&#160;Edit&#160;&#160;</a>
                    <a href="/threads/{{$thread->id}}/replies/{{$reply->id}}/delete" class="btn btn-danger">Delete</a><br/>
                @endif
                Created by: {{$reply->user->name}}<br/>
                Created at: {{$reply->created_at}}</br>
                Updated at: {{$reply->updated_at}}
            </div>
        </div>
        <hr/>
    @endforeach
@endsection
