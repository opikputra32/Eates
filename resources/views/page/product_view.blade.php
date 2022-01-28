@extends('layout.master')

@section('title', 'Product List')

@section('content')
    {{-- {{ $products }} --}}
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
    <table class="table mt-5 mb-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td> <img src="{{ asset($product->image ) }}" alt="Gambar {{$product->name}}" class="rounded" style="width: 10rem"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category_id == 1 ? 'Television' : ($product->category_id == 2 ? 'Laptop' : 'Smartphone') }}
                    </td>
                    <td>
                        <div class="d-flex justify-content-between" style="
                                width: 8rem">

                                <form action="{{ '/product/' . $product->id . '/edit' }}" method="GET">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Edit</button>
                                </form>

                                <form action="{{ '/product/' . $product->id . '/delete' }}" method="post">
                                    @csrf

                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
