<div class="formulario">
    <div class="campo">
        <label for="name">Nombre *</label>
        <input type="text" id="name" name="name" value="{{ old('name', $centro['name'] ?? '') }}" required>
        @error('name') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="location">Ubicación *</label>
        <input type="text" id="location" name="location" value="{{ old('location', $centro['location'] ?? '') }}" required>
        @error('location') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo campo-botones">
        <button type="submit" class="boton boton-primario">{{ isset($centro) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('training-centers.index') }}" class="boton boton-secundario">Cancelar</a>
    </div>
</div>