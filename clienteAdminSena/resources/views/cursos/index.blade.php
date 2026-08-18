@extends('layout')

@section('titulo', 'Cursos')

@section('contenido')
    <div class="cabecera-recurso">
        <h1>Cursos</h1>
        <a href="{{ route('cursos.create') }}" class="boton boton-primario">+ Nuevo curso</a>
    </div>

    @if (count($cursos) === 0)
        <p class="vacio">No hay cursos registrados.</p>
    @else
        <div class="tabla-envoltura">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Número</th>
                        <th>Día</th>
                        <th>Área</th>
                        <th>Centro</th>
                        <th>Profesores</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso['id'] }}</td>
                            <td>{{ $curso['course_number'] }}</td>
                            <td>{{ $curso['day'] }}</td>
                            <td>{{ $curso['area']['name'] ?? '—' }}</td>
                            <td>{{ $curso['training_center']['name'] ?? '—' }}</td>
                            <td>
                                @forelse ($curso['teachers'] ?? [] as $profesor)
                                    {{ $profesor['name'] }}{{ !$loop->last ? ',' : '' }}
                                @empty
                                    —
                                @endforelse
                            </td>
                            <td class="acciones">
                                <a href="{{ route('cursos.edit', $curso['id']) }}" class="boton boton-pequeno">Editar</a>
                                <form action="{{ route('cursos.destroy', $curso['id']) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton boton-pequeno boton-peligro" onclick="return confirm('¿Eliminar este curso?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection