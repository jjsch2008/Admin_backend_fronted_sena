@extends('layout')

@section('titulo', 'Nueva área')

@section('contenido')
    <h1>Nueva área</h1>

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        @include('areas._form')
    </form>
@endsection