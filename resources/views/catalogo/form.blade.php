<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control"
           value="{{ old('titulo', $catalogo->titulo ?? '') }}">
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="form-control">{{ old('descripcion', $catalogo->descripcion ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="genero" class="form-label">Género</label>
    <input type="text" name="genero" id="genero" class="form-control"
           value="{{ old('genero', $catalogo->genero ?? '') }}">
</div>

<div class="mb-3">
    <label for="director" class="form-label">Director</label>
    <input type="text" name="director" id="director" class="form-control"
           value="{{ old('director', $catalogo->director ?? '') }}">
</div>

<div class="mb-3">
    <label for="fecha_estreno" class="form-label">Fecha de estreno</label>
    <input type="date" name="fecha_estreno" id="fecha_estreno" class="form-control"
           value="{{ old('fecha_estreno', $catalogo->fecha_estreno ?? '') }}">
</div>
