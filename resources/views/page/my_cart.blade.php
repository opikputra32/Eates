@extends('layout.master')

@section('title', 'My Cart')

@section('content')
    @if (session()->has('success'))
        <div class="mb-3">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="container-fluid">
        @if ($cartItems->isEmpty())
            <div class="card text-center m-5">
                <div class="card-body">
                    <h5 class="card-title">Seems your cart is empty</h5>
                    <p class="card-text">Let's add your cart now!!</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Start Shopping</a>
                </div>
            </div>
        @endif
        @foreach ($cartItems as $CartItems => $product)
            <div class="card mt-3 mb-3">
                <div class="row g-0">
                    <div class="col-md-3 p-2">
                        <img src={{ $product->image }} class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-5 d-flex flex-column p-2">
                        <div class="flex-grow-1">
                            <div class="d-flex">
                                <h3 class="card-title text-bold mb-2">{{ $product->name }} </h3>
                                <p class="text-muted"><sup>(@currency($product->price))</sup></p>
                            </div>
                            {{-- <p class="card-text">{{ App\Models\Courier::find($product->courier_id) }}</p> --}}
                            {{ $product->courier_id }}
                            <h6 class="card-subtitle text-muted mb-4">
                                x{{ $product->quantity }} pcs
                            </h6>
                        </div>
                        <p class="card-text">@currency($product->product_price)</p>
                        @auth
                            <div class="d-flex justify-content-between" style="width: 8rem">
                                <form action="{{ '/my-cart/' . $product->id . '/edit' }}" method="GET">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Edit</button>
                                </form>

                                <form action="{{ '/my-cart/' . $product->id . '/delete' }}" method="post">
                                    @csrf

                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        @else
                            <a href="/login"><button type="submit" class="btn btn-warning">Login to Buy</button></a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
        @if (!$cartItems->isEmpty())

            <div class="d-flex justify-content-between mb-3">
                <div class="container">
                    <h5 class="font-weight-bold">Total Price: </h5>
                    <p class="text-muted m-2">@currency($total)</p>
                </div>

                <form action="{{ route('posts.order') }}" method="post">
                    @csrf
                    <select class="form-select mb-3" aria-label="Default select example" name="courier_id">
                        @foreach ($couriers as $courier)
                            <option value={{ $courier->id }}>{{ $courier->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="total" value="{{ $total }}">
                    <button type="submit" class="btn btn-warning float-end">Checkout({{ $cartItems->count() }})</button>
                </form>
            </div>
        @endif
    </div>

@endsection
