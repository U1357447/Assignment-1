@extends('layouts.app')

@section('panelheader')
    <h3>Edit Reply</h3>
@endsection

@section('panelbody')
    <form method="POST" action="/threads/{{$thread->id}}/replies/{{$reply->id}}">
        {{method_field('PATCH')}}
        {{csrf_field()}}
        <div class="form-group">
            <textarea name="content" class="form-control">{{$reply->content}}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
