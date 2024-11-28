<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomasController extends Controller
{
    public function index(Request $request)
    {
        
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'id'); 

        
        $idiomas = Idioma::query()
            ->when($search, function ($query, $search) {
                $query->where('idioma', 'like', '%' . $search . '%'); 
            })
            ->orderBy($sortBy) 
            ->paginate(10); 

        return view('idiomas.index', ['idiomas' => $idiomas]);
    }

    public function create()
    {
        return view('idiomas.create');
    }

    public function store(Request $request)
    {
        Idioma::create($request->all());
        return redirect()->route('idiomas-index');
    }

    public function edit($id)
    {
        $idiomas = Idioma::where('id', $id)->first();
        if (!empty($idiomas)) {
            return view('idiomas.edit', ['idiomas' => $idiomas]);
        } else {
            return redirect()->route('idiomas-index');
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'idioma' => $request->idioma,
        ];
        Idioma::where('id', $id)->update($data);
        return redirect()->route('idiomas-index');
    }

    public function destroy($id)
    {
        Idioma::where('id', $id)->delete();
        return redirect()->route('idiomas-index');
    }
}
