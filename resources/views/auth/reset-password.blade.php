@extends('layouts.app')

@section('titulo', 'Nueva contraseña')

@section('contenido')
    <div class="caja">
        <h2>Nueva contraseña</h2>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required>

            <label for="password">Nueva contraseña</label>
            <input id="password" type="password" name="password" required>

            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>

            <button type="submit">Guardar</button>
        </form>
    </div>
@endsection
