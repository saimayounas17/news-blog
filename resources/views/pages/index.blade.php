@extends('layouts.all')
   
   @section('content')
   <div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>This is the Resto blog</p>
    <p><a href="/login"><button type="button" class="btn btn-primary btn-lg" role="button">Login</button></a> <a href="/register"><button type="button" class="btn btn-success btn-lg" role="button">Register</button></a></p>
    </div>
    @endsection