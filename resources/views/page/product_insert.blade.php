@extends('layout.master')

@section('title', 'Insert Product')

@section('content')

    <form class="container-fluid py-5" method="post" action="{{ route('post.insertProduct') }}" enctype="multipart/form-data">
        @csrf
        <legend> Insert New Product</legend>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" aria-describedby="emailHelp"
                placeholder="Product Name">
            <label for="floatingInput">Product Name</label>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea name="description" id="floatingInput" class="form-control" placeholder="Product Description"
                rows="3"></textarea>
            <label for="floatingInput">Product Description</label>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="price" class="form-control" id="floatingInput" aria-describedby="emailHelp"
                placeholder="Product Price">
            <label for="floatingInput">Product Price</label>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary float-end">Add</button>
    </form>

@endsection
