@extends('layouts.app')

@section('titulo', 'Productos')

@section('contenido')
    <h2>Productos</h2>

    <a href="{{ route('productos.create') }}" class="boton">+ Nuevo producto</a>

    <form method="GET" action="{{ route('productos.index') }}" class="buscador">
        <input type="text" name="consulta" value="{{ request('consulta') }}" placeholder="Buscar producto">
        <button type="submit">Buscar</button>
    </form>

    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        @forelse ($productos as $producto)
            <tr>
                <td><img src="{{ asset('img/' . $producto->imagen) }}" alt="" class="mini-foto"></td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->marca }}</td>
                <td>{{ $producto->categoria }}</td>
                <td>Q{{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ route('productos.edit', $producto) }}">Editar</a>

                        <form method="POST" action="{{ route('productos.destroy', $producto) }}" class="form-eliminar" onsubmit="return confirm('¿Eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No hay productos.</td>
            </tr>
        @endforelse
    </table>

    {{ $productos->links('pagination::simple-default') }}
@endsection
