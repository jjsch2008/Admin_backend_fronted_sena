@extends('layout')

@section('titulo', 'Nuevo aprendiz')

@section('contenido')
    <h1>Nuevo aprendiz</h1>

    <form action="{{ route('aprendices.store') }}" method="POST">
        @csrf
        @include('aprendices._form')
    </form>
@endsection