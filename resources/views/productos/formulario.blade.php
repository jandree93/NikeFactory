<label for="nombre">Nombre</label>
<input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" required>

<label for="marca">Marca</label>
<input type="text" id="marca" name="marca" value="{{ old('marca', $producto->marca ?? 'Nike') }}" required>

<label for="categoria">Categoría</label>
<select id="categoria" name="categoria" required>
    @foreach (['Running', 'Lifestyle', 'Basketball', 'Training'] as $cat)
        <option value="{{ $cat }}" {{ old('categoria', $producto->categoria ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
    @endforeach
</select>

<label for="descripcion">Descripción</label>
<textarea id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>

<label for="precio">Precio (Q)</label>
<input type="number" id="precio" name="precio" step="0.01" min="0" value="{{ old('precio', $producto->precio ?? '') }}" required>

<label for="stock">Stock</label>
<input type="number" id="stock" name="stock" min="0" value="{{ old('stock', $producto->stock ?? '') }}" required>

<label for="imagen">Imagen (nombre del archivo en public/img)</label>
<input type="text" id="imagen" name="imagen" value="{{ old('imagen', $producto->imagen ?? '') }}" placeholder="air-max-90.jpg">
