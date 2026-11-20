<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') - Nike Factory</title>

    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header>
        <h1><a href="{{ url('/') }}">Nike Factory</a></h1>
    </header>

    <nav class="menu">
        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('img/snkrs-logo.png') }}" alt="Nike SNKRS"></a>

        <a href="{{ url('/') }}" class="menu-boton">Tienda</a>
        <a href="{{ route('compradores.create') }}" class="menu-boton">Quiero comprar</a>

        @auth
            <a href="{{ route('dashboard') }}" class="menu-boton">Panel</a>

            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'vendedor')
                <a href="{{ route('compradores.index') }}" class="menu-boton">Compradores</a>
                <a href="{{ route('productos.index') }}" class="menu-boton">Productos</a>
            @endif

            <a href="{{ route('profile.edit') }}" class="menu-boton">Mi cuenta</a>

            <form method="POST" action="{{ route('logout') }}" class="salir">
                @csrf
                <button type="submit" class="menu-boton">Salir</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="menu-boton">Ingresar</a>
            <a href="{{ route('register') }}" class="menu-boton">Registrarse</a>
        @endauth
    </nav>

    <main class="contenido">

        @if (session('success'))
            <div class="alerta-exito">{{ session('success') }}</div>
        @endif

        @if (session('status'))
            <div class="alerta-exito">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="alerta-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('contenido')
    </main>

</body>

</html>
