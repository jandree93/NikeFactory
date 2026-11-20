@extends('layouts.app')

@section('titulo', 'Editar comprador')

@section('contenido')
    <h2>Editar comprador</h2>

    <div class="caja">
        <form method="POST" action="{{ route('compradores.update', $comprador) }}">
            @csrf
            @method('PUT')

            @include('compradores.formulario')

            <label for="estado">Estado</label>
            <select id="estado" name="estado">
                @foreach (['nuevo', 'contactado', 'interesado', 'compro', 'descartado'] as $estado)
                    <option value="{{ $estado }}" {{ old('estado', $comprador->estado) == $estado ? 'selected' : '' }}>{{ ucfirst($estado) }}</option>
                @endforeach
            </select>

            <button type="submit">Guardar cambios</button>
        </form>

        <p><a href="{{ route('compradores.index') }}">Regresar</a></p>
    </div>
@endsection
