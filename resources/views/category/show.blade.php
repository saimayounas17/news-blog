@extends('layouts.all')


@section('content')
<a href="/posts" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>
<img style="width:35%;" src="/storage/cover_image/{{$post->cover_image}}" alt="">
<br><br>
<div>{{$post->body}}</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<br><br>
<hr>
@if(!auth::guest())
@if(auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
   {!! Form::open(['action' => [ 'PostsController@destroy',$post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
  {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
    @endif
@endsection