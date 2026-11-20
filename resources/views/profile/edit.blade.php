@extends('layouts.app')

@section('titulo', 'Mi cuenta')

@section('contenido')
    <h2>Mi cuenta</h2>
    <p>Rol: <strong>{{ $user->role }}</strong></p>

    <div class="caja">
        <h3>Mis datos</h3>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <label for="name">Nombre</label>
            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Correo</label>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>

            <button type="submit">Guardar</button>
        </form>
    </div>

    <div class="caja">
        <h3>Cambiar contraseña</h3>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <label for="current_password">Contraseña actual</label>
            <input id="current_password" type="password" name="current_password">
            @error('current_password', 'updatePassword')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="password">Nueva contraseña</label>
            <input id="password" type="password" name="password">
            @error('password', 'updatePassword')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="password_confirmation">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation">

            <button type="submit">Cambiar</button>
        </form>
    </div>

    <div class="caja">
        <h3>Eliminar cuenta</h3>
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('¿Seguro que quieres eliminar tu cuenta?')">
            @csrf
            @method('DELETE')

            <label for="password_borrar">Escribe tu contraseña</label>
            <input id="password_borrar" type="password" name="password" required>
            @error('password', 'userDeletion')
                <span class="error">{{ $message }}</span>
            @enderror

            <button type="submit" class="boton-rojo">Eliminar cuenta</button>
        </form>
    </div>
@endsection
