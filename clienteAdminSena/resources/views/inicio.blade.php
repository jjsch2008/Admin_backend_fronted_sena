@extends('layout')

@section('titulo', 'Admin SENA')

@section('contenido')
    <h1>Panel de administración</h1>

    <div class="tarjetas">
        <a href="{{ route('training-centers.index') }}" class="tarjeta">
            <h2>Centros de formación</h2>
        </a>
        <a href="{{ route('areas.index') }}" class="tarjeta">
            <h2>Áreas</h2>
        </a>
        <a href="{{ route('cursos.index') }}" class="tarjeta">
            <h2>Cursos</h2>
        </a>
        <a href="{{ route('aprendices.index') }}" class="tarjeta">
            <h2>Aprendices</h2>
        </a>
        <a href="{{ route('teachers.index') }}" class="tarjeta">
            <h2>Profesores</h2>
        </a>
        <a href="{{ route('computadores.index') }}" class="tarjeta">
            <h2>Computadores</h2>
        </a>
    </div>
@endsection
