@extends('layouts.all')


@section('content')

<h2>Categories</h2>
@if(count($category)>0)
@foreach($category as $categories)
<div class="well">
    <div class="row">
        <div class="col-md-8">
            <h3>{{$categories->category}}</h3>
            <small>Written on {{$categories->created_at}} by {{$categories->user->name}}</small>
        </div>
        <td><a href="/category/{{$categories->id}}/edit" class="btn btn-primary" style="margin-left:240px;">Edit</a>
        </td>
        <td>
            {!! Form::open(['action' => [ 'CategoryController@destroy',$categories->id], 'method' => 'POST',
            'class' => 'pull-right']) !!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        </td>
    </div>
</div>
@endforeach
@else
<p>No posts found</p>
@endif
@endsection