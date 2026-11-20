@extends('layouts.app')

@section('titulo', 'Quiero comprar')

@section('contenido')
    <h2>Quiero comprar</h2>
    <p>Déjanos tus datos y lo que buscas, un asesor te va a contactar.</p>

    <div class="caja">
        <form method="POST" action="{{ route('compradores.store') }}">
            @csrf

            @include('compradores.formulario')

            <button type="submit">Enviar</button>
        </form>
    </div>
@endsection
