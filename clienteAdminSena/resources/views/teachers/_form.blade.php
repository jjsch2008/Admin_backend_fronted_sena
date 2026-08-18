<div class="formulario">
    <div class="campo">
        <label for="name">Nombre *</label>
        <input type="text" id="name" name="name" value="{{ old('name', $profesor['name'] ?? '') }}" required>
        @error('name') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $profesor['email'] ?? '') }}">
        @error('email') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="area_id">Área *</label>
        <select name="area_id" id="area_id" required>
            <option value="">Seleccione un área...</option>
            @foreach ($areas as $area)
                <option value="{{ $area['id'] }}" {{ (string) old('area_id', $profesor['area_id'] ?? '') === (string) $area['id'] ? 'selected' : '' }}>
                    {{ $area['name'] }}
                </option>
            @endforeach
        </select>
        @error('area_id') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="training_center_id">Centro de formación *</label>
        <select name="training_center_id" id="training_center_id" required>
            <option value="">Seleccione un centro...</option>
            @foreach ($centros as $centro)
                <option value="{{ $centro['id'] }}" {{ (string) old('training_center_id', $profesor['training_center_id'] ?? '') === (string) $centro['id'] ? 'selected' : '' }}>
                    {{ $centro['name'] }}
                </option>
            @endforeach
        </select>
        @error('training_center_id') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo campo-botones">
        <button type="submit" class="boton boton-primario">{{ isset($profesor) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('teachers.index') }}" class="boton boton-secundario">Cancelar</a>
    </div>
</div>