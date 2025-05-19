@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="mt-5">Bienvenido a Cinetest 🎬</h1>
    <p class="lead">Tu colección personal de películas</p>
    @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Registrarse</a>
    @else
        <a href="{{ route('catalogo.index') }}" class="btn btn-success">Ir a Mis Películas</a>
    @endguest
</div>
@endsection
