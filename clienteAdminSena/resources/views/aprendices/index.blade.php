@extends('layout')

@section('titulo', 'Aprendices')

@section('contenido')
    <div class="cabecera-recurso">
        <h1>Aprendices</h1>
        <a href="{{ route('aprendices.create') }}" class="boton boton-primario">+ Nuevo aprendiz</a>
    </div>

    @if (count($aprendices) === 0)
        <p class="vacio">No hay aprendices registrados.</p>
    @else
        <div class="tabla-envoltura">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Celular</th>
                        <th>Curso</th>
                        <th>Computador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aprendices as $aprendiz)
                        <tr>
                            <td>{{ $aprendiz['id'] }}</td>
                            <td>{{ $aprendiz['name'] }}</td>
                            <td>{{ $aprendiz['email'] ?? '—' }}</td>
                            <td>{{ $aprendiz['cell_number'] ?? '—' }}</td>
                            <td>{{ $aprendiz['curso']['course_number'] ?? '—' }}</td>
                            <td>{{ $aprendiz['computador']['marca'] ?? '—' }} {{ $aprendiz['computador']['numero'] ?? '' }}</td>
                            <td class="acciones">
                                <a href="{{ route('aprendices.edit', $aprendiz['id']) }}" class="boton boton-pequeno">Editar</a>
                                <form action="{{ route('aprendices.destroy', $aprendiz['id']) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton boton-pequeno boton-peligro" onclick="return confirm('¿Eliminar este aprendiz?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection