<div class="formulario">
    <div class="campo">
        <label for="course_number">Número de curso *</label>
        <input type="text" id="course_number" name="course_number" value="{{ old('course_number', $curso['course_number'] ?? '') }}" required>
        @error('course_number') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="day">Día *</label>
        <select name="day" id="day" required>
            <option value="">Seleccione un día...</option>
            @foreach (['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'] as $dia)
                <option value="{{ $dia }}" {{ old('day', $curso['day'] ?? '') == $dia ? 'selected' : '' }}>{{ $dia }}</option>
            @endforeach
        </select>
        @error('day') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="area_id">Área *</label>
        <select name="area_id" id="area_id" required>
            <option value="">Seleccione un área...</option>
            @foreach ($areas as $area)
                <option value="{{ $area['id'] }}" {{ (string) old('area_id', $curso['area_id'] ?? '') === (string) $area['id'] ? 'selected' : '' }}>
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
                <option value="{{ $centro['id'] }}" {{ (string) old('training_center_id', $curso['training_center_id'] ?? '') === (string) $centro['id'] ? 'selected' : '' }}>
                    {{ $centro['name'] }}
                </option>
            @endforeach
        </select>
        @error('training_center_id') <p class="error-campo">{{ $message }}</p> @enderror
    </div>

    <div class="campo">
        <label for="teacher_ids">Profesores</label>
        <select name="teacher_ids[]" id="teacher_ids" multiple>
            @foreach ($profesores as $profesor)
                @php
                    $seleccionado = false;
                    if (old('teacher_ids')) {
                        $seleccionado = in_array($profesor['id'], old('teacher_ids'));
                    } else {
                        foreach (($curso['teachers'] ?? []) as $t) {
                            if ($t['id'] == $profesor['id']) {
                                $seleccionado = true;
                                break;
                            }
                        }
                    }
                @endphp
                <option value="{{ $profesor['id'] }}" {{ $seleccionado ? 'selected' : '' }}>{{ $profesor['name'] }}</option>
            @endforeach
        </select>
        <p class="ayuda">Mantenga Ctrl presionado para elegir varios.</p>
    </div>

    <div class="campo campo-botones">
        <button type="submit" class="boton boton-primario">{{ isset($curso) ? 'Actualizar' : 'Crear' }}</button>
        <a href="{{ route('cursos.index') }}" class="boton boton-secundario">Cancelar</a>
    </div>
</div>