@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Película</h1>
    <form action="{{ route('catalogo.store') }}" method="POST">
        @csrf
        @include('catalogo.form')
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
