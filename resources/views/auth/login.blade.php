@extends('layouts.app')

@section('titulo', 'Ingresar')

@section('contenido')
    <div class="caja">
        <h2>Ingresar</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>

            <label class="check">
                <input type="checkbox" name="remember"> Recordarme
            </label>

            <button type="submit">Ingresar</button>
        </form>

        <p><a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a></p>
        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
    </div>
@endsection
