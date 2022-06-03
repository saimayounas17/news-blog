@extends('layouts.all')


@section('content')

<h3>Create Category</h3>
{!! Form::open(['action'=>'CategoryController@store','method'=>'post', 'enctype' => 'multipart/form-data']) !!}
<!-------->
<div class="col-md-4 form-group">
    <!-- {{Form::label('category', 'Category')}} -->
    {{Form::text('category', '', ['class'=>'form-control', 'placeholder' => 'Category'])}}
</div>

<!--------->
{{Form::submit('Submit' , ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection