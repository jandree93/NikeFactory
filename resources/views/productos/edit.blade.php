@extends('layouts.app')

@section('titulo', 'Editar producto')

@section('contenido')
    <h2>Editar producto</h2>

    <div class="caja">
        <form method="POST" action="{{ route('productos.update', $producto) }}">
            @csrf
            @method('PUT')

            @include('productos.formulario')

            <button type="submit">Guardar cambios</button>
        </form>

        <p><a href="{{ route('productos.index') }}">Regresar</a></p>
    </div>
@endsection
