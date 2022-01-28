@extends('layout.master')

@section('title', 'Register Page')

@section('content')
    @if (session()->has('failed'))
            <div class="mb-3">
                <div class="alert alert-danger" role="alert">
                    {{ session('failed') }}
                </div>
            </div>
    @endif
    <form method="post" action="/handleRegister" class="container py-5">
        @csrf
        <legend> Join With Us</legend>
        <div class="form-floating mb-3">
            <input type="text" name="full_name" class="form-control" id="floatingInput" aria-describedby="emailHelp"
                placeholder="Full Name">
            <label for="floatingInput">Full Name</label>
            @error('fullName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="disabledTextInput" class="form-label">Gender</label>
            <br>
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
            <label class="form-check-label" for="inlineRadio1">Male</label>
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female">
            <label class="form-check-label" for="inlineRadio1">Female</label>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea name="address" id="floatingInput" class="form-control" placeholder="Address" rows="3"></textarea>
            <label for="floatingInput">Address</label>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control" id="floatingInput" aria-describedby="emailHelp"
                placeholder="Email">
            <label for="floatingInput">Email</label>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
            <label for="floatingInput">Password</label>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" class="form-control" id="floatingInput"
                placeholder="Confirm Password">
            <label for="floatingInput">Confirm Password</label>
            @error('password_confirmation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" name="agreement">
            <label class="form-check-label" for="exampleCheck1">I agree with terms & conditions</label>
            @error('agreement')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning float-end">Register Now</button>
    </form>

@endsection
