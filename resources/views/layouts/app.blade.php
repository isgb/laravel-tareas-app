<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi App Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="{{ url('/') }}">Laravel</a>
        @auth
            <span class="text-white me-3">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">Cerrar sesión</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Registro</a>
        @endguest
    </nav>

    <main class="container py-4">
        @yield('content')
    </main>
</body>
</html>
