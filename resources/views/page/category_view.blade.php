@extends('layout.master')

@section('title', 'Category List')

@section('content')
    {{-- {{ $products }} --}}
    @if (session()->has('success'))
            <div class="mb-3">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    <h3 class="mt-3">Manage Category</h3>
    <table class="table  mb-5">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $category->category }}</td>
                    <td>
                        <div class="d-flex justify-content-between" style="
                                width: 8rem">

                                <form action="{{ '/category/' . $category->id . '/edit' }}" method="GET">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">Edit</button>
                                </form>

                                <form action="{{ '/category/' . $category->id . '/delete' }}" method="post">
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
