@extends('layouts.all')


@section('content')

<h2>Create Posts</h2>
{!! Form::open(['action'=>'PostsController@store','method'=>'post', 'enctype' => 'multipart/form-data']) !!}
<!-------->
<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class'=>'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('category', 'Category')}}
    {{Form::select('category_name', $cat, null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', '', ['class'=>'form-control', 'placeholder' => 'Body Text'])}}
</div>
<div class="form-group">
    {{Form::label('tags', 'Tags')}}
    {{Form::text('tags', '', ['class'=>'form-control', 'placeholder' => 'Tags.....'])}}
</div>
<div class="form-group">
    {{Form::file('cover_image')}}
</div>
<!--------->
{{Form::submit('Submit' , ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection