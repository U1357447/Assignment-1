@extends('layouts.app')

@section('panelheader')
    <h3>Edit Thread</h3>
@endsection

@section('panelbody')
    <form method="POST" action="/threads/{{$thread->id}}/update">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{$thread->title}}"/>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control">{{$thread->content}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Thread</button>
        </div>
    </form>
@endsection
