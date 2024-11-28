<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id'); 

        
        $generos = Genero::query()
            ->when($search, function ($query, $search) {
                $query->where('nome_genero', 'like', '%' . $search . '%'); 
            })
            ->orderBy($sortBy) 
            ->paginate(10); 

        return view('generos.index', ['generos' => $generos]);
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        Genero::create($request->all());
        return redirect()->route('generos-index');
    }

    public function edit($id)
    {
        $generos = Genero::where('id', $id)->first();
        if (!empty($generos)) {
            return view('generos.edit', ['generos' => $generos]);
        } else {
            return redirect()->route('generos-index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nome_genero' => $request->nome_genero,
        ];
        Genero::where('id', $id)->update($data);
        return redirect()->route('generos-index');
    }

    public function destroy($id)
    {
        Genero::where('id', $id)->delete();
        return redirect()->route('generos-index');
    }
}
