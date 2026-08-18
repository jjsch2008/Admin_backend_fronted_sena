<div class="formulario">
    <div class="campo">
        <label for="name">Nombre *</label>
        <input type="text" id="name" name="name" value="{{ old('name', $area['name'] ?? '') }}" required>
        @error('name') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo campo-botones">
        <button type="submit" class="boton boton-primario">{{ isset($area) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('areas.index') }}" class="boton boton-secundario">Cancelar</a>
    </div>
</div>