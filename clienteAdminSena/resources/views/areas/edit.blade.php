@extends('layout')

@section('titulo', 'Editar área')

@section('contenido')
    <h1>Editar área</h1>

    <form action="{{ route('areas.update', $area['id']) }}" method="POST">
        @csrf
        @method('PUT')
        @include('areas._form')
    </form>
@endsection