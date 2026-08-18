@extends('layout')

@section('titulo', 'Nuevo profesor')

@section('contenido')
    <h1>Nuevo profesor</h1>

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        @include('teachers._form')
    </form>
@endsection