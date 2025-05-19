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
            'titulo' => 'required',
            'genero' => 'required',
            'director' => 'required',
            'fecha_estreno' => 'required|date',
        ]);

        Catalogo::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'genero' => $request->genero,
            'director' => $request->director,
            'fecha_estreno' => $request->fecha_estreno,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('catalogo.index')->with('success', 'Película agregada');
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
