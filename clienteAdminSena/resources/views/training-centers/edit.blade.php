@extends('layout')

@section('titulo', 'Editar centro')

@section('contenido')
    <h1>Editar centro de formación</h1>

    <form action="{{ route('training-centers.update', $centro['id']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('training-centers._form')
    </form>
@endsection