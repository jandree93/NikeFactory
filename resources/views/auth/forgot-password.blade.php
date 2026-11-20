@extends('layouts.app')

@section('titulo', 'Recuperar contraseña')

@section('contenido')
    <div class="caja">
        <h2>Recuperar contraseña</h2>
        <p>Escribe tu correo y te enviamos un enlace para cambiar tu contraseña.</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

            <button type="submit">Enviar enlace</button>
        </form>
    </div>
@endsection
