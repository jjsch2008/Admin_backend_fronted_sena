@extends('layout')

@section('titulo', 'Editar profesor')

@section('contenido')
    <h1>Editar profesor</h1>

    <form action="{{ route('teachers.update', $profesor['id']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('teachers._form')
    </form>
@endsection