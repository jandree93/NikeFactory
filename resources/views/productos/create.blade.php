@extends('layouts.app')

@section('titulo', 'Nuevo producto')

@section('contenido')
    <h2>Nuevo producto</h2>

    <div class="caja">
        <form method="POST" action="{{ route('productos.store') }}">
            @csrf

            @include('productos.formulario')

            <button type="submit">Guardar</button>
        </form>

        <p><a href="{{ route('productos.index') }}">Regresar</a></p>
    </div>
@endsection
