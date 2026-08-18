@extends('layout')

@section('titulo', 'Nuevo computador')

@section('contenido')
    <h1>Nuevo computador</h1>

    <form action="{{ route('computadores.store') }}" method="POST">
        @csrf
        @include('computadores._form')
    </form>
@endsection