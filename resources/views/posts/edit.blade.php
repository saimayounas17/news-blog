@extends('layouts.all')


@section('content')

<h2>Edit Posts</h2>
{!! Form::open(['action'=>[ 'PostsController@update',$post->id],'method'=>'post', 'enctype' => 'multipart/form-data'])
!!}
<!-------->
<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('category', 'Category')}}
    {{Form::select('category_name', $cat, null, ['class'=>'form-control'])}}

</div>
<div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', $post->body, ['class'=>'form-control', 'placeholder' => 'Body Text'])}}
</div>
<div class="form-group">
    {{Form::file('cover_image')}}
</div>
<!--------->
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit' , ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection