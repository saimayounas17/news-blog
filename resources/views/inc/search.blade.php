@extends('layouts.all')


@section('content')

<h2>Posts</h2>
<div class="col text-left">
    <!-- <form action=""> -->
    {!! Form::open(['url' => 'search', 'method' => 'POST', 'class'=>'form-horizontal', 'files' =>
    'true',
    'enctype' => 'multipart/form-data']) !!}
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search for products">
        <div class="input-group-append">
            <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>


    {!! Form::close() !!}

</div>
@if(count($post)>0)
@foreach($post as $posts)
<div class="well">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <img style="width:100%;" src="{{asset('storage/cover_image')}}/{{$posts->cover_image}}" alt="">
        </div>
        <div class="col-md-8 col-sm-8">
            <h3><a href="/posts/{{$posts->id}}">{{$posts->title}}</a></h3>
            <small>Written on {{$posts->created_at}} by {{$posts->user->name}}</small>
        </div>
    </div>
</div>
@endforeach
@else
<p>No posts found</p>
@endif
@endsection