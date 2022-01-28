@extends('layout.master')

@section('title', 'Home')

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
                <div class="alert alert-danger" role="alert">
                    {{ session('failed') }}
                </div>
            </div>
    @endif
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 p-5">

            @foreach ($productList as $product)
            <div class="col">
                <div class="card h-100">
                    <img src={{asset($product->image )}} class="card-img-top" alt="Gambar {{$product->name}}">
                    <div class="card-body d-flex flex-column justify-content-end">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <h6 class="card-subtitle text-muted">{{$product->category_id == 1? 'Television' : ($product->category_id == 2 ? 'Laptop' : 'Smartphone')}}</h6>
                        </div>
                        <p class="card-text">@currency($product->price)</p>
                        <a href={{'/product/detail/' . $product->id}}><button type="button" class="btn btn-warning">More Detail</button></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        {{ $productList->links('pagination::bootstrap-4') }}
    </div>
    {{-- <div class="">
    </div> --}}

@endsection
