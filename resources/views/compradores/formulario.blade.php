
<label for="nombre">Nombre *</label>
<input type="text" id="nombre" name="nombre" value="{{ old('nombre', $comprador->nombre ?? '') }}" required>

<label for="apellido">Apellido *</label>
<input type="text" id="apellido" name="apellido" value="{{ old('apellido', $comprador->apellido ?? '') }}" required>

<label for="correo">Correo *</label>
<input type="email" id="correo" name="correo" value="{{ old('correo', $comprador->correo ?? '') }}" required>

<label for="telefono">Teléfono *</label>
<input type="text" id="telefono" name="telefono" value="{{ old('telefono', $comprador->telefono ?? '') }}" placeholder="5555-1234" required>

<label for="departamento">Departamento *</label>
@php
    $departamentos = ['Alta Verapaz', 'Baja Verapaz', 'Chimaltenango', 'Chiquimula', 'El Progreso', 'Escuintla',
        'Guatemala', 'Huehuetenango', 'Izabal', 'Jalapa', 'Jutiapa', 'Peten', 'Quetzaltenango', 'Quiche',
        'Retalhuleu', 'Sacatepequez', 'San Marcos', 'Santa Rosa', 'Solola', 'Suchitepequez', 'Totonicapan', 'Zacapa'];
@endphp
<select id="departamento" name="departamento" required>
    <option value="">-- Selecciona --</option>
    @foreach ($departamentos as $dep)
        <option value="{{ $dep }}" {{ old('departamento', $comprador->departamento ?? '') == $dep ? 'selected' : '' }}>{{ $dep }}</option>
    @endforeach
</select>

<label for="producto_id">¿Qué tenis te interesan?</label>
<select id="producto_id" name="producto_id">
    <option value="">Todavía no sé</option>
    @foreach ($productos as $producto)
        <option value="{{ $producto->id }}" {{ old('producto_id', $comprador->producto_id ?? request('producto')) == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }} - Q{{ $producto->precio }}</option>
    @endforeach
</select>

<label for="talla">Talla (US)</label>
<input type="number" id="talla" name="talla" step="0.5" min="3" max="16" value="{{ old('talla', $comprador->talla ?? '') }}">

<label for="estilo">Estilo</label>
<select id="estilo" name="estilo">
    <option value="">-- Selecciona --</option>
    @foreach (['Running', 'Lifestyle', 'Basketball', 'Training'] as $estilo)
        <option value="{{ $estilo }}" {{ old('estilo', $comprador->estilo ?? '') == $estilo ? 'selected' : '' }}>{{ $estilo }}</option>
    @endforeach
</select>

<label for="presupuesto">Presupuesto</label>
<select id="presupuesto" name="presupuesto">
    <option value="">-- Selecciona --</option>
    @foreach (['Menos de Q500', 'Q500 - Q1000', 'Q1000 - Q1500', 'Mas de Q1500'] as $p)
        <option value="{{ $p }}" {{ old('presupuesto', $comprador->presupuesto ?? '') == $p ? 'selected' : '' }}>{{ $p }}</option>
    @endforeach
</select>

<label for="metodo_contacto">¿Cómo te contactamos? *</label>
<select id="metodo_contacto" name="metodo_contacto" required>
    @foreach (['WhatsApp', 'Llamada', 'Correo'] as $m)
        <option value="{{ $m }}" {{ old('metodo_contacto', $comprador->metodo_contacto ?? '') == $m ? 'selected' : '' }}>{{ $m }}</option>
    @endforeach
</select>

<label for="comentarios">Comentarios</label>
<textarea id="comentarios" name="comentarios">{{ old('comentarios', $comprador->comentarios ?? '') }}</textarea>
