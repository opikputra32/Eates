@extends('layout.master')

@section('title', 'Home')

@section('content')
    <div class="card mb-3 m-5">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="{{ asset($product->image) }}" class="img-fluid rounded-start" alt="Gambar {{$product->name}}">
            </div>
            <div class="col-md-6 ml-2">
                <div class="card-body">
                    <h2 class="card-title text-bold">{{ $product->name }}</h2>
                    <hr>
                    <h3>Category:</h3>
                    <h6 class="card-subtitle text-muted">
                        {{ ($product->category_id == 1 ? 'Television' : $product->category_id == 2) ? 'Laptop' : 'Smartphone' }}
                    </h6>
                    <hr>
                    <h3 class="text-bold">Price</h3>
                    <p class="card-text">@currency($product->price)</p>
                    <hr>
                    <h3>Description</h3>
                    <p class="card-text">{{ $product->description }}</p>
                    <hr>
                    @auth
                        <form action="{{'/my-cart/' . $product->id. '/edit'}}" method="post" class="input-group mb-3">
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control" type="hidden" name="id" id="id" value="{{ $product->id }}">
                                <input class="form-control" type="number" name="quantity" id="Quantity" placeholder="Quantity" value="{{$product->quantity}}">
                                <input type="hidden" name="productPrice" value="{{$product->price}}">
                                <button class="btn btn-warning" type="submit">Save</button>
                            </div>
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </form>
                    @else
                        <a href="/login"><button type="submit" class="btn btn-warning">Login to Buy</button></a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    @endsection
