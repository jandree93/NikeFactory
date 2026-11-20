@extends('layouts.app')

@section('titulo', 'Compradores')

@section('contenido')
    <h2>Posibles compradores</h2>

    <form method="GET" action="{{ route('compradores.index') }}" class="buscador">
        <input type="text" name="consulta" value="{{ request('consulta') }}" placeholder="Buscar por nombre, correo o teléfono">
        <select name="estado">
            <option value="">Todos</option>
            @foreach (['nuevo', 'contactado', 'interesado', 'compro', 'descartado'] as $estado)
                <option value="{{ $estado }}" {{ request('estado') == $estado ? 'selected' : '' }}>{{ ucfirst($estado) }}</option>
            @endforeach
        </select>
        <button type="submit">Buscar</button>
    </form>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Contacto</th>
            <th>Departamento</th>
            <th>Le interesa</th>
            <th>Talla</th>
            <th>Presupuesto</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        @forelse ($compradores as $comprador)
            <tr>
                <td>{{ $comprador->nombre }} {{ $comprador->apellido }}</td>
                <td>
                    {{ $comprador->correo }}<br>
                    {{ $comprador->telefono }} ({{ $comprador->metodo_contacto }})
                </td>
                <td>{{ $comprador->departamento }}</td>
                <td>{{ $comprador->producto->nombre ?? 'No sabe' }}</td>
                <td>{{ $comprador->talla }}</td>
                <td>{{ $comprador->presupuesto }}</td>
                <td><span class="estado {{ $comprador->estado }}">{{ $comprador->estado }}</span></td>
                <td>
                    <a href="{{ route('compradores.edit', $comprador) }}">Editar</a>

                    @if (auth()->user()->role == 'admin')
                        <form method="POST" action="{{ route('compradores.destroy', $comprador) }}" class="form-eliminar" onsubmit="return confirm('¿Eliminar este comprador?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No hay compradores todavía.</td>
            </tr>
        @endforelse
    </table>

    {{ $compradores->links('pagination::simple-default') }}
@endsection
