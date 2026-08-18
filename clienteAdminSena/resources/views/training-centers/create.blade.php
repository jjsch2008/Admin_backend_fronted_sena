@extends('layout')

@section('titulo', 'Nuevo centro')

@section('contenido')
    <h1>Nuevo centro de formación</h1>

    <form action="{{ route('training-centers.store') }}" method="POST">
        @csrf
        @include('training-centers._form')
    </form>
@endsection