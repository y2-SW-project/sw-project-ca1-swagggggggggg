@extends('layouts.app')

@section('content')

<div class="container border border-white rounded">
    <div class="col-md-10 mx-auto mt-5 justify-content-center text-center">
        <div class="col-md-8 mx-auto mt-3 mb-2 display-1">Welcome to BRAP</div>

        <a href="/login" class="col-md-6 mx-auto my-2 btn btn-primary rounded-pill" role="button">Login</a>
        <a href="/register" class="col-md-6 mx-auto my-2 btn btn-secondary rounded-pill" role="button">Register</a>
    </div>
    
</div>

@endsection