@extends('layout')

@section('titulo', 'Editar aprendiz')

@section('contenido')
    <h1>Editar aprendiz</h1>

    <form action="{{ route('aprendices.update', $aprendiz['id']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('aprendices._form')
    </form>
@endsection