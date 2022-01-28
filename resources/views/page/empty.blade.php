@extends('layout.master')

@section('title', 'Empty Search')

@section('content')
<div class="card text-center m-5">
    <div class="card-body">
        <h5 class="card-title">Sorry the {{$product}} is not found</h5>
        <p class="card-text">Don't worry check this out the product we have!!</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Start Searching</a>
    </div>
</div>
@endsection
