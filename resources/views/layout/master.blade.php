<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body>

    {{-- Navbar top --}}
    <nav class="navbar navbar-light bg-primary">
        <div class="container-fluid">
            <img class="navbar-brand" src="{{ asset('image/logo.png') }}" style="width: 5rem" />
            <form class="d-flex" method="GET" action="{{ route('post.search') }}">
                @csrf
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
                <button class="btn btn-success" type="submit">Search</button>
            </form>
        </div>
    </nav>




    {{-- Navbar for each user role --}}
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    @auth
                        {{-- If User is Admin then display menu admin --}}
                        @if (strcmp(Auth::user()->role, 'admin') == 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage Product
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/view-product">View Product</a></li>
                                    <li><a class="dropdown-item" href="/add-product">Add Product</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Manage Category
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/view-category">View Category</a></li>
                                    <li><a class="dropdown-item" href="/add-category">Add Category</a></li>
                                </ul>
                            </li>

                            {{-- When User is member it display the member menu --}}
                        @elseif (strcmp(Auth::user()->role, 'member') == 0)
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/my-cart">My Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('get.transactions') }}">History Transaction</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                {{-- Check if already login --}}
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-outline-success" type="submit" href>Logout</button>
                    </form>
                @else
                    <div class="d-flex justify-content-between">
                        <div class="container p-0">
                            <a href="/login"><button class="btn btn-outline-success" type="submit" href>Login</button></a>
                        </div>
                        <div class="container">
                            <a href="/register"><button class="btn btn-outline-success" type="submit">Register</button></a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </nav>

        {{-- Main Content to Children --}}
        <div class="container">
            @yield('content')
        </div>

        <div class="container-fluid text-center bg-primary py-2">
            <div class="d-flex justify-content-center mt-2">
                <div class="p-2 me-3">
                    <a href="https://www.facebook.com/" class="text-white"><img
                            src="{{ asset('image/logo_facebook.svg') }}" style="width: 1.5rem" alt="Facebook"></a>
                </div>
                <div class="p-2 me-3">
                    <a href="https://www.instagram.com/" class="text-white"><img
                            src="{{ asset('image/logo_instagram.svg') }}" style="width: 1.5rem" alt="Instagram"></a>
                </div>
                <div class="p-2">
                    <a href="https://www.google.com/" class="text-white"><img
                            src="{{ asset('image/logo_question.svg') }}" style="width: 1.5rem" alt="Question"></a>
                </div>
            </div>
            <p class="card-text text-white py-3">&copy; 2021 Copyright Eates</p>

        </div>
        <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>

    </html>
