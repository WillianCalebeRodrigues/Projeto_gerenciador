@extends('layouts.app')
@section('title', 'Listagem de Álbuns')

@section('content')
<div class="container mx-auto mt-8 px-4">

    
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Listagem de Álbuns</h1>
    </div>

    
    <div class="mb-6">
        <form action="{{ route('albuns-index') }}" method="GET" class="flex flex-wrap items-center justify-between space-y-4 md:space-y-0">
           
            <input 
                type="text" 
                name="search" 
                placeholder="Buscar por nome ou artista..." 
                value="{{ request('search') }}" 
                class="w-full md:w-2/3 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            
            
            <select 
                name="sort_by" 
                class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Ordenar por ID</option>
                <option value="nome_album" {{ request('sort_by') == 'nome_album' ? 'selected' : '' }}>Ordenar por Nome</option>
                <option value="artista" {{ request('sort_by') == 'artista' ? 'selected' : '' }}>Ordenar por Artista</option>
                <option value="ano_lancamento" {{ request('sort_by') == 'ano_lancamento' ? 'selected' : '' }}>Ordenar por Ano de Lançamento</option>
            </select>

            
            <button 
                type="submit" 
                class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none"
            >
                Buscar
            </button>
        </form>
    </div>

    
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">
                        <a href="?sort_by=id" class="hover:underline">ID</a>
                    </th>
                    <th class="px-6 py-4 text-left">
                        <a href="?sort_by=nome_album" class="hover:underline">Nome</a>
                    </th>
                    <th class="px-6 py-4 text-left">Artista</th>
                    <th class="px-6 py-4 text-left">
                        <a href="?sort_by=ano_lancamento" class="hover:underline">Ano de Lançamento</a>
                    </th>
                    <th class="px-6 py-4 text-left">Gênero</th>
                    <th class="px-6 py-4 text-left">Idioma</th>
                    <th class="px-6 py-4 text-center">Editar/Deletar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($albuns as $album)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $album->id }}</td>
                        <td class="px-6 py-4">{{ $album->nome_album }}</td>
                        <td class="px-6 py-4">{{ $album->artista->nome_artista ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4">{{ $album->ano_lancamento }}</td>
                        <td class="px-6 py-4">{{ $album->genero->nome_genero ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4">{{ $album->idioma->idioma ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center items-center space-x-2">
                                
                                <a href="{{ route('albuns-edit', ['id' => $album->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none" aria-label="Editar álbum">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>

                               
                                <form action="{{ route('albuns-destroy', ['id' => $album->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este álbum?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none" aria-label="Deletar álbum">
                                        <i class="bi bi-trash3-fill"></i> Deletar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-6 py-4">Nenhum álbum encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
    <div class="mt-6">
        {{ $albuns->links() }}
    </div>

    
    <div class="mt-6">
        <a href="{{ route('albuns-create') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none">
            <i class="bi bi-plus-lg"></i> Adicionar Álbum
        </a>
    </div>
</div>
@endsection
