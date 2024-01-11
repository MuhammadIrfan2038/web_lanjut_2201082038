<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PanShoes - @yield('title', 'Website')</title>
    <link href="/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="/" style="font-weight: bold; padding-right: 30px; font-size: 25px;">PanShoes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/" style="font-size: 20px;">Home</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link active ms-2" href="/sepatus/data" style="font-size: 20px;">Master Data</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0  text-dark">
                    <form action="/" class="d-flex " role="search">
                        <input class="form-control me-2 bg-light-subtle" type="search" name="search"
                            placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ps-4" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <form action="/logout" method="post">
                                    @csrf
                                    <li>
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </li>
                                </form>

                            </ul>
                        </li>
                    @else
                        <li class="nav-item text-dark">
                            <a class="nav-link" href="/login"><i class="bi bi-person-lock"></i> Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-2 mx-auto">
        @yield('content')
    </div>

    <footer class="bg-dark text-dark text-light-emphasis">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <p>&copy; copyright 2023 | built with <i class="bi bi-heart-fill"></i> by <a href="http://instagram.com/mhdirfan17_" target="_blank">Muhammad Irfan</a></p>
                    </div>
                </div>
            </div>
    </footer>

    <script src="/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
