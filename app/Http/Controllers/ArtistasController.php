<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); 
        $sortBy = $request->input('sort_by', 'id'); 

       
        $artistas = Artista::when($search, function ($query, $search) {
            $query->where('nome_artista', 'LIKE', "%$search%")
                  ->orWhere('nacionalidade', 'LIKE', "%$search%");
        })
        ->orderBy($sortBy, 'ASC')
        ->paginate(10); 

        return view('artistas.index', compact('artistas'));
    }

    public function create()
    {
        $generos = Genero::orderBy('nome_genero', 'ASC')->get();

        return view('artistas.create', [
            'generos' => $generos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_artista' => 'required|string|max:100',
            'nacionalidade' => 'required|string|max:100',
            'genero_artista' => 'required|exists:generos,id',
        ]);

        Artista::create($request->all());

        return redirect()->route('artistas-index')->with('success', 'Artista criado com sucesso!');
    }

    public function edit($id)
    {
        $artista = Artista::findOrFail($id); 
        $generos = Genero::orderBy('nome_genero', 'ASC')->get(); 
        return view('artistas.edit', compact('artista', 'generos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_artista' => 'required|string|max:100',
            'nacionalidade' => 'required|string|max:100',
            'genero_artista' => 'required|exists:generos,id',
        ]);

        $artista = Artista::findOrFail($id);
        $artista->update([
            'nome_artista' => $request->nome_artista,
            'nacionalidade' => $request->nacionalidade,
            'genero_artista' => $request->genero_artista,
        ]);

        return redirect()->route('artistas-index')->with('success', 'Artista atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $artista = Artista::findOrFail($id);
        $artista->delete();

        return redirect()->route('artistas-index')->with('success', 'Artista excluído com sucesso!');
    }
}
