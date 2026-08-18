<div class="formulario">
    <div class="campo">
        <label for="name">Nombre *</label>
        <input type="text" id="name" name="name" value="{{ old('name', $aprendiz['name'] ?? '') }}" required>
        @error('name') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $aprendiz['email'] ?? '') }}">
        @error('email') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="cell_number">Celular</label>
        <input type="text" id="cell_number" name="cell_number" value="{{ old('cell_number', $aprendiz['cell_number'] ?? '') }}">
        @error('cell_number') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="curso_id">Curso *</label>
        <select name="curso_id" id="curso_id" required>
            <option value="">Seleccione un curso...</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso['id'] }}" {{ (string) old('curso_id', $aprendiz['curso_id'] ?? '') === (string) $curso['id'] ? 'selected' : '' }}>
                    {{ $curso['course_number'] }} ({{ $curso['day'] }})
                </option>
            @endforeach
        </select>
        @error('curso_id') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="computer_id">Computador</label>
        <select name="computer_id" id="computer_id">
            <option value="">Sin computador</option>
            @foreach ($computadores as $computador)
                <option value="{{ $computador['id'] }}" {{ (string) old('computer_id', $aprendiz['computer_id'] ?? '') === (string) $computador['id'] ? 'selected' : '' }}>
                    {{ $computador['marca'] }} ({{ $computador['numero'] }})
                </option>
            @endforeach
        </select>
        @error('computer_id') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo campo-botones">
        <button type="submit" class="boton boton-primario">{{ isset($aprendiz) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('aprendices.index') }}" class="boton boton-secundario">Cancelar</a>
    </div>
</div>