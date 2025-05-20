<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Listado de películas del usuario autenticado
    public function index()
    {
        $peliculas = Catalogo::where('user_id', auth()->id())->get();
        return view('catalogo.index', compact('peliculas'));
    }

    // Formulario para agregar
    public function create()
    {
        return view('catalogo.create');
    }

    // Guardar nueva película
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'genero' => 'required|string',
            'director' => 'required|string',
            'fecha_estreno' => 'required|date',
        ], [
            'titulo.required' => 'El título es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'genero.required' => 'El género es obligatorio.',
            'director.required' => 'El director es obligatorio.',
            'fecha_estreno.required' => 'La fecha de estreno es obligatoria.',
        ]);

        // Guarda la película
        $pelicula = new Catalogo();
        $pelicula->titulo = $request->titulo;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->genero = $request->genero;
        $pelicula->director = $request->director;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->user_id = auth()->id();
        $pelicula->save();

        return redirect()->route('catalogo.index')->with('success', 'Película agregada correctamente.');
    }

    // Formulario para editar
    public function edit($id)
    {
        $catalogo = Catalogo::findOrFail($id);

        if ($catalogo->user_id !== auth()->id()) {
            abort(403); // Acceso prohibido
        }

        return view('catalogo.edit', compact('catalogo'));
    }

    // Actualizar película
    public function update(Request $request, $id)
    {
        $catalogo = Catalogo::findOrFail($id);

        if ($catalogo->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'titulo' => 'required',
            'genero' => 'required',
            'director' => 'required',
            'fecha_estreno' => 'required|date',
        ]);

        $catalogo->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'genero' => $request->genero,
            'director' => $request->director,
            'fecha_estreno' => $request->fecha_estreno,
        ]);

        return redirect()->route('catalogo.index')->with('success', 'Película actualizada');
    }

    // Eliminar película
    public function destroy($id)
    {
        $catalogo = Catalogo::findOrFail($id);

        if ($catalogo->user_id !== auth()->id()) {
            abort(403);
        }

        $catalogo->delete();

        return redirect()->route('catalogo.index')->with('success', 'Película eliminada');
    }
}
