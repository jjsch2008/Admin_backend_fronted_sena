@extends('layout')

@section('titulo', 'Editar computador')

@section('contenido')
    <h1>Editar computador</h1>

    <form action="{{ route('computadores.update', $computador['id']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('computadores._form')
    </form>
@endsection