@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Películas</h1>
    <a href="{{ route('catalogo.create') }}" class="btn btn-primary mb-3">Agregar nueva película</a>

    @if($peliculas->isEmpty())
        <p>No tienes películas registradas.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Género</th>
                    <th>Director</th>
                    <th>Fecha de Estreno</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->genero }}</td>
                    <td>{{ $pelicula->director }}</td>
                    <td>{{ $pelicula->fecha_estreno }}</td>
                    <td>
                        <a href="{{ route('catalogo.edit', $pelicula->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('catalogo.destroy', $pelicula->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
