<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShiftPlanning</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4 px-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">ShiftPlanning</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @if (Request()->path() == 'dashboard') active @endif"
                            href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request()->path() == 'users') active @endif"
                            href="{{ route('users.index') }}">Users</a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle @if (Request()->path() == 'users' || Request()->path() == 'classes' || Request()->path() == 'schedule') active @endif"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Menus
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item @if (Request()->path() == 'matkul') active @endif"
                                    href="{{ Route('matkul.index') }}">Matkul</a></li>
                            <li><a class="dropdown-item @if (Request()->path() == 'classes') active @endif"
                                    href="{{ Route('classes.index') }}">Classes</a></li>
                            <li><a class="dropdown-item @if (Request()->path() == 'schedule') active @endif"
                                    href="{{ Route('schedule.index') }}">Schedule</a></li>
                        </ul>
                    </li>
                </ul>
                <span class="navbar-text">
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu list-unstyled" aria-labelledby="navbarDropdownMenuLink">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="nav-link ps-3" type="submit">Logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
