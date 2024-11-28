<?php

namespace App\Http\Controllers;

use App\Models\Albun;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Idioma;
use App\Models\Musica;
use Illuminate\Http\Request;

class MusicasController extends Controller
{
    public function index(Request $request)
    {
        
        $musicas = Musica::with('artista', 'genero', 'idioma', 'album');

       
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $musicas = $musicas->where(function($query) use ($search) {
                $query->where('musica_nome', 'like', "%{$search}%")
                      ->orWhereHas('artista', function($query) use ($search) {
                          $query->where('nome_artista', 'like', "%{$search}%");
                      })
                      ->orWhereHas('album', function($query) use ($search) {
                          $query->where('nome_album', 'like', "%{$search}%");
                      })
                      ->orWhereHas('genero', function($query) use ($search) {
                          $query->where('nome_genero', 'like', "%{$search}%");
                      });
            });
        }

        
        if ($request->has('sort_by') && $request->sort_by) {
            $sortBy = $request->sort_by;
            $musicas = $musicas->orderBy($sortBy);
        } else {
           
            $musicas = $musicas->orderBy('id');
        }

        
        $musicas = $musicas->paginate(10); 

        return view('musicas.index', ['musicas' => $musicas]);
    }

    public function create()
    {
        $artistas = Artista::all();  
        $generos = Genero::all();    
        $idiomas = Idioma::all(); 
        $albuns = Albun::all();   

        return view('musicas.create', [
            'artistas' => $artistas,    
            'generos' => $generos,     
            'idiomas' => $idiomas, 
            'albuns'  => $albuns,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'musica_nome' => 'required|string|max:100',
            'musica_artista' => 'required|exists:artistas,id',
            'musica_album' =>'required|exists:albuns,id',
            'musica_genero' => 'required|exists:generos,id',
            'musica_idioma' => 'required|exists:idiomas,id',
            'musica_link' => 'required|string|max:500',
        ]);

        Musica::create([
            'musica_nome' => $request->musica_nome,
            'musica_artista' => $request->musica_artista,
            'musica_album' => $request->musica_album,
            'musica_genero' => $request->musica_genero,
            'musica_idioma' => $request->musica_idioma,
            'musica_link' => $request->musica_link,
        ]);

        return redirect()->route('musicas-index')->with('success', 'Música adicionada com sucesso!');
    }

    public function edit($id)
    {
        $musica = Musica::findOrFail($id);
        $artistas = Artista::all();
        $albuns = Albun::all();
        $generos = Genero::all();
        $idiomas = Idioma::all();

        return view('musicas.edit', compact('musica', 'artistas','albuns', 'generos', 'idiomas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'musica_nome' => 'required|string|max:100',
            'musica_artista' => 'required|exists:artistas,id',
            'musica_album' =>'required|exists:albuns,id',
            'musica_genero' => 'required|exists:generos,id',
            'musica_idioma' => 'required|exists:idiomas,id',
            'musica_link' => 'required|string|max:500',
        ]);

        $musica = Musica::findOrFail($id);
        $musica->update([
            'musica_nome' => $request->musica_nome,
            'musica_artista' => $request->musica_artista,
            'musica_album' => $request->musica_album,
            'musica_genero' => $request->musica_genero,
            'musica_idioma' => $request->musica_idioma,
            'musica_link' => $request->musica_link,
        ]);

        return redirect()->route('musicas-index')->with('success', 'Música atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Musica::destroy($id); 
        return redirect()->route('musicas-index')->with('success', 'Música excluída com sucesso!');
    }

    
    public function getAlbunsPorArtista($artistaId)
    {
        
        $albuns = Albun::where('artista_id', $artistaId)->get();

       
        return response()->json($albuns);
    }
}
