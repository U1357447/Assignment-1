@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Create a New Thread</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="/threads/add">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Threads</div>

                        @foreach($threads as $thread)
                            <div class="panel-body">
                                <a href="{{$thread->path()}}"><h2>{{$thread->title}}</h2></a>
                                <div class="col-md-9">
                                    {{$thread->content}}
                                </div>
                                <div class="col-md-3">
                                    <a href="/threads/{{$thread->id}}/edit">Edit Thread</a><br/>
                                    Created by: {{$thread->user->name}}<br/>
                                    Created at: {{$thread->created_at}}</br>
                                    Updated at: {{$thread->updated_at}}
                                </div>
                            </div>
                            <hr/>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
