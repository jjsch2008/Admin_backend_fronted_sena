@extends('layout')

@section('titulo', 'Computadores')

@section('contenido')
    <div class="cabecera-recurso">
        <h1>Computadores</h1>
        <a href="{{ route('computadores.create') }}" class="boton boton-primario">+ Nuevo computador</a>
    </div>

    @if (count($computadores) === 0)
        <p class="vacio">No hay computadores registrados.</p>
    @else
        <div class="tabla-envoltura">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Número</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($computadores as $computador)
                        <tr>
                            <td>{{ $computador['id'] }}</td>
                            <td>{{ $computador['marca'] }}</td>
                            <td>{{ $computador['numero'] }}</td>
                            <td class="acciones">
                                <a href="{{ route('computadores.edit', $computador['id']) }}" class="boton boton-pequeno">Editar</a>
                                <form action="{{ route('computadores.destroy', $computador['id']) }}" method="POST" class="form-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton boton-pequeno boton-peligro" onclick="return confirm('¿Eliminar este computador?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection