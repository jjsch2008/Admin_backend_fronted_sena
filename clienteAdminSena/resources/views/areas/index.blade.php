@extends('layout')

@section('titulo', 'Áreas')

@section('contenido')
    <div class="cabecera-recurso">
        <h1>Áreas</h1>
        <a href="{{ route('areas.create') }}" class="boton boton-primario">+ Nueva área</a>
    </div>

    @if (count($areas) === 0)
        <p class="vacio">No hay áreas registradas.</p>
    @else
        <div class="tabla-envoltura">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{ $area['id'] }}</td>
                            <td>{{ $area['name'] }}</td>
                            <td class="acciones">
                                <a href="{{ route('areas.edit', $area['id']) }}" class="boton boton-pequeno">Editar</a>
                                <form action="{{ route('areas.destroy', $area['id']) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton boton-pequeno boton-peligro" onclick="return confirm('¿Eliminar esta área?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection