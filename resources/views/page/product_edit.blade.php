@extends('layout.master')

@section('title', 'Insert Product')

@section('content')
    @if (session()->has('success'))
            <div class="mb-3">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
    @endif
    @if (session()->has('failed'))
            <div class="mb-3">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    <form class="container py-5" method="post" action="{{ route('post.edit') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <legend> Edit Product</legend>
        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control" id="floatingInput" aria-describedby="emailHelp"
                placeholder="Product Name" value="{{$product->name}}">
            <label for="floatingInput">Product Name</label>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea name="description" id="floatingInput" class="form-control" placeholder="Product Description"
                rows="3">{{$product->description}}</textarea>
            <label for="floatingInput">Product Description</label>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="number" name="price" class="form-control" id="floatingInput" aria-describedby="emailHelp"
                placeholder="Product Price" value="{{$product->price}}">
            <label for="floatingInput">Product Price</label>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{$product->category_id == $category->id? 'selected' : ''}}>{{ $category->category }}
                    </option>
                @endforeach
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="image" name="image" value="{{$product->image}}">
            {{$product->image}}

        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary float-end">Save</button>
    </form>

@endsection
