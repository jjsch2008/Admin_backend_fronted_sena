<div class="formulario">
    <div class="campo">
        <label for="marca">Marca *</label>
        <input type="text" id="marca" name="marca" value="{{ old('marca', $computador['marca'] ?? '') }}" required>
        @error('marca') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="numero">Número *</label>
        <input type="text" id="numero" name="numero" value="{{ old('numero', $computador['numero'] ?? '') }}" required>
        @error('numero') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo campo-botones">
        <button type="submit" class="boton boton-primario">{{ isset($computador) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('computadores.index') }}" class="boton boton-secundario">Cancelar</a>
    </div>
</div>