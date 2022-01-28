@extends('layout.master')

@section('title','Insert New Category')

@section('content')

<form class="container- py-5" method="POST" action="{{route('post.add_category')}}">
    @csrf
    <legend> Insert New Category</legend>
    <div class="form-floating mb-3">
        <input name="category" id="floatingInput" class="form-control" placeholder="Category Name" rows="3">
        <label for="floatingInput">Category Name</label>
        @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection
