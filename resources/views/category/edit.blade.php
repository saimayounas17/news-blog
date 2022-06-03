@extends('layouts.all')


@section('content')

<h2>Edit Category</h2>
{!! Form::open(['action'=>[ 'CategoryController@update',$category->id],'method'=>'post', 'enctype' =>
'multipart/form-data'])
!!}
<!-------->
<div class="col-md-4 form-group">
    <!-- {{Form::label('category', 'Category')}} -->
    {{Form::text('category', $category->category, ['class'=>'form-control', 'placeholder' => 'Category'])}}
</div>

<!--------->
{{Form::hidden('_method','PUT')}}
{{Form::submit('Submit' , ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection