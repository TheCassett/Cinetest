@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Película</h1>
    <form action="{{ route('catalogo.update', $catalogo->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('catalogo.form')
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
