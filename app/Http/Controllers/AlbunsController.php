<?php

namespace App\Http\Controllers;

use App\Models\Albun;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Idioma;
use Illuminate\Http\Request;

class AlbunsController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->get('search');
        $sortBy = $request->get('sort_by', 'id');
        
        
        $query = Albun::with('artista', 'genero', 'idioma');

        
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nome_album', 'like', "%{$search}%")
                      ->orWhereHas('artista', function ($query) use ($search) {
                          $query->where('nome_artista', 'like', "%{$search}%");
                      });
            });
        }

       
        $query->orderBy($sortBy, 'asc');

        
        $albuns = $query->paginate(10);

        return view('albuns.index', ['albuns' => $albuns]);
    }

    public function create()
    {
        $artistas = Artista::all();
        $generos = Genero::all();
        $idiomas = Idioma::all();

        return view('albuns.create', [
            'artistas' => $artistas,
            'generos' => $generos,
            'idiomas' => $idiomas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_album' => 'required|string|max:100',
            'album_artista' => 'required|exists:artistas,id',
            'ano_lancamento' => 'required|integer|min:1000|max:' . date('Y'),
            'album_genero' => 'required|exists:generos,id',
            'album_idioma' => 'required|exists:idiomas,id',
        ]);

        Albun::create([
            'nome_album' => $request->nome_album,
            'album_artista' => $request->album_artista,
            'ano_lancamento' => $request->ano_lancamento,
            'album_genero' => $request->album_genero,
            'album_idioma' => $request->album_idioma,
        ]);

        return redirect()->route('albuns-index')->with('success', 'Álbum criado com sucesso!');
    }

    public function edit($id)
    {
        $album = Albun::findOrFail($id);
        $artistas = Artista::all();
        $generos = Genero::all();
        $idiomas = Idioma::all();

        return view('albuns.edit', compact('album', 'artistas', 'generos', 'idiomas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_album' => 'required|string|max:100',
            'album_artista' => 'required|exists:artistas,id',
            'ano_lancamento' => 'required|integer|min:1000|max:' . date('Y'),
            'album_genero' => 'required|exists:generos,id',
            'album_idioma' => 'required|exists:idiomas,id',
        ]);

        $album = Albun::findOrFail($id);
        $album->update([
            'nome_album' => $request->nome_album,
            'album_artista' => $request->album_artista,
            'ano_lancamento' => $request->ano_lancamento,
            'album_genero' => $request->album_genero,
            'album_idioma' => $request->album_idioma,
        ]);

        return redirect()->route('albuns-index')->with('success', 'Álbum atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Albun::destroy($id);
        return redirect()->route('albuns-index')->with('success', 'Álbum excluído com sucesso!');
    }

  
    public function getAlbunsByArtista($artistaId)
    {
        $albuns = Albun::where('album_artista', $artistaId)->get();

        if ($albuns->isEmpty()) {
            return response()->json(['message' => 'Nenhum álbum encontrado para este artista.'], 404);
        }

        return response()->json($albuns);
    }
}
