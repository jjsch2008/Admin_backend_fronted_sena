@extends('layout')

@section('titulo', 'Centros de formación')

@section('contenido')
    <div class="cabecera-recurso">
        <h1>Centros de formación</h1>
        <a href="{{ route('training-centers.create') }}" class="boton boton-primario">+ Nuevo centro</a>
    </div>

    @if (count($centros) === 0)
        <p class="vacio">No hay centros registrados.</p>
    @else
        <div class="tabla-envoltura">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centros as $centro)
                        <tr>
                            <td>{{ $centro['id'] }}</td>
                            <td>{{ $centro['name'] }}</td>
                            <td>{{ $centro['location'] }}</td>
                            <td class="acciones">
                                <a href="{{ route('training-centers.edit', $centro['id']) }}" class="boton boton-pequeno">Editar</a>
                                <form action="{{ route('training-centers.destroy', $centro['id']) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton boton-pequeno boton-peligro" onclick="return confirm('¿Eliminar este centro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection