@extends('layout')

@section('titulo', 'Profesores')

@section('contenido')
    <div class="cabecera-recurso">
        <h1>Profesores</h1>
        <a href="{{ route('teachers.create') }}" class="boton boton-primario">+ Nuevo profesor</a>
    </div>

    @if (count($profesores) === 0)
        <p class="vacio">No hay profesores registrados.</p>
    @else
        <div class="tabla-envoltura">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Área</th>
                        <th>Centro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor['id'] }}</td>
                            <td>{{ $profesor['name'] }}</td>
                            <td>{{ $profesor['email'] ?? '—' }}</td>
                            <td>{{ $profesor['area']['name'] ?? '—' }}</td>
                            <td>{{ $profesor['training_center']['name'] ?? '—' }}</td>
                            <td class="acciones">
                                <a href="{{ route('teachers.edit', $profesor['id']) }}" class="boton boton-pequeno">Editar</a>
                                <form action="{{ route('teachers.destroy', $profesor['id']) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton boton-pequeno boton-peligro" onclick="return confirm('¿Eliminar este profesor?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection