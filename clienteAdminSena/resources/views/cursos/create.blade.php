@extends('layout')

@section('titulo', 'Nuevo curso')

@section('contenido')
    <h1>Nuevo curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        @include('cursos._form')
    </form>
@endsection