@extends('layouts.app')

@section('titulo', 'Panel')

@section('contenido')
    <h2>Hola, {{ auth()->user()->name }}</h2>

    @if (auth()->user()->role == 'comprador')
        <h3>Mis solicitudes</h3>

        @if ($solicitudes->count() == 0)
            <p>Todavía no has enviado ninguna solicitud.</p>
        @else
            <table>
                <tr>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Talla</th>
                    <th>Estado</th>
                </tr>
                @foreach ($solicitudes as $s)
                    <tr>
                        <td>{{ $s->created_at->format('d/m/Y') }}</td>
                        <td>{{ $s->producto->nombre ?? 'No sabe' }}</td>
                        <td>{{ $s->talla }}</td>
                        <td><span class="estado {{ $s->estado }}">{{ $s->estado }}</span></td>
                    </tr>
                @endforeach
            </table>
        @endif

        <a href="{{ route('compradores.create') }}" class="boton">Nueva solicitud</a>
    @else
        <div class="tarjetas">
            <div class="tarjeta">
                <span class="numero">{{ $totalCompradores }}</span>
                <p>Compradores</p>
            </div>
            <div class="tarjeta">
                <span class="numero">{{ $nuevos }}</span>
                <p>Sin contactar</p>
            </div>
            <div class="tarjeta">
                <span class="numero">{{ $totalProductos }}</span>
                <p>Productos</p>
            </div>
        </div>

        <h3>Últimos compradores</h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Le interesa</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
            @foreach ($ultimos as $c)
                <tr>
                    <td>{{ $c->nombre }} {{ $c->apellido }}</td>
                    <td>{{ $c->producto->nombre ?? 'No sabe' }}</td>
                    <td><span class="estado {{ $c->estado }}">{{ $c->estado }}</span></td>
                    <td>{{ $c->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </table>

        <a href="{{ route('compradores.index') }}" class="boton">Ver todos</a>
    @endif
@endsection
