@extends('layouts.app')

@section('addform')
    @if(Auth::check())
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Create a New Thread</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="/threads/add">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{old('title')}}"/>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control">{{old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create Thread</button>
                    </div>
                </form>
            </div>
            @if(count($errors))
                @foreach($errors->all() as $error)
                    <div class="panel-body">
                        <div class="alert alert-danger" role="alert">
                            <p>{{$error}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
@endsection

@section('panelheader')
    <h3>Threads</h3>
@endsection

@section('panelbody')
    @foreach($threads as $thread)
        <div class="panel-body">
            <a href="{{$thread->path()}}"><h2>{{$thread->title}}</h2></a>
            <div class="col-md-9">
                {{$thread->content}}
            </div>
            <div class="col-md-3">
                @if(Auth::id() == $thread->user_id)
                    <a href="/threads/{{$thread->id}}/edit" class="btn btn-primary">&#160;&#160;Edit&#160;&#160;</a>
                    <a href="/threads/{{$thread->id}}/delete" class="btn btn-danger">Delete</a><br/>
                @endif
                Created by: {{$thread->user->name}}<br/>
                Created at: {{$thread->created_at}}</br>
                Updated at: {{$thread->updated_at}}
            </div>
        </div>
        <hr/>
    @endforeach
@endsection
