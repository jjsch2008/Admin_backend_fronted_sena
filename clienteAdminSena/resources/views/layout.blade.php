<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Admin SENA')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="cabecera">
        <div class="contenedor cabecera-flex">
            <a href="{{ route('inicio') }}" class="logo">Admin<span>SENA</span></a>
            <nav class="navegacion">
                <a href="{{ route('training-centers.index') }}">Centros</a>
                <a href="{{ route('areas.index') }}">Áreas</a>
                <a href="{{ route('cursos.index') }}">Cursos</a>
                <a href="{{ route('aprendices.index') }}">Aprendices</a>
                <a href="{{ route('teachers.index') }}">Profesores</a>
                <a href="{{ route('computadores.index') }}">Computadores</a>
            </nav>
        </div>
    </header>

    <main class="contenedor principal">
        @if (session('exito'))
            <div class="alerta alerta-exito">{{ session('exito') }}</div>
        @endif

        @if (session('error'))
            <div class="alerta alerta-error">{{ session('error') }}</div>
        @endif

        @yield('contenido')
    </main>
</body>
</html>
