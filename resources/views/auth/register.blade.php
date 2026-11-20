@extends('layouts.app')

@section('titulo', 'Registrarse')

@section('contenido')
    <div class="caja">
        <h2>Crear cuenta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required>

            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>

            <button type="submit">Registrarse</button>
        </form>

        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}">Ingresa aquí</a></p>
    </div>
@endsection
