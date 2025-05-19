@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Editar Perfil</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('perfil.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nueva Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirmar Nueva Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto de perfil</label>
            <input type="file" name="foto" class="form-control">
        </div>

        @if (Auth::user()->foto)
            <div class="mb-3">
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" width="100" alt="Foto actual">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Actualizar perfil</button>
    </form>
</div>
@endsection
