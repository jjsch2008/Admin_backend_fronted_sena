@extends('layout')

@section('titulo', 'Editar curso')

@section('contenido')
    <h1>Editar curso</h1>

    <form action="{{ route('cursos.update', $curso['id']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('cursos._form')
    </form>
@endsection