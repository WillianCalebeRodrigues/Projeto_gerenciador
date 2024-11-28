@extends('layouts.app')
@section('title', 'Listagem de Músicas')

@section('content')
<div class="container mx-auto mt-8 px-4">

    
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Listagem de Músicas</h1>
    </div>

    
    <div class="mb-6">
        <form action="{{ route('musicas-index') }}" method="GET" class="flex flex-wrap items-center justify-between space-y-4 md:space-y-0">
           
            <input 
                type="text" 
                name="search" 
                placeholder="Pesquisar músicas..." 
                value="{{ request('search') }}"
                class="w-full md:w-2/3 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            
            
            <select 
                name="sort_by" 
                class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Ordenar por ID</option>
                <option value="musica_nome" {{ request('sort_by') == 'musica_nome' ? 'selected' : '' }}>Ordenar por Nome</option>
                <option value="artista_id" {{ request('sort_by') == 'artista_id' ? 'selected' : '' }}>Ordenar por Artista</option>
                <option value="album_id" {{ request('sort_by') == 'album_id' ? 'selected' : '' }}>Ordenar por Álbum</option>
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
                        <a href="?sort_by=musica_nome" class="hover:underline">Nome</a>
                    </th>
                    <th class="px-6 py-4 text-left">Artista</th>
                    <th class="px-6 py-4 text-left">Álbum</th>
                    <th class="px-6 py-4 text-left">Gênero</th>
                    <th class="px-6 py-4 text-left">Idioma</th>
                    <th class="px-6 py-4 text-left">Link</th>
                    <th class="px-6 py-4 text-center">Editar/Deletar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($musicas as $musica)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $musica->id }}</td>
                        <td class="px-6 py-4">{{ $musica->musica_nome }}</td>
                        <td class="px-6 py-4">{{ $musica->artista->nome_artista ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4">{{ $musica->album->nome_album ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4">{{ $musica->genero->nome_genero ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4">{{ $musica->idioma->idioma ?? 'Não especificado' }}</td>

                      
                        <td class="px-6 py-4">
                            <a href="{{ $musica->musica_link }}" target="_blank" class="text-blue-500 hover:text-blue-700" aria-label="Link da música">
                                {{ $musica->musica_link }}
                            </a>
                        </td>

                       
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center items-center space-x-2">
                                <a href="{{ route('musicas-edit', ['id' => $musica->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none" aria-label="Editar música">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>

                                <form action="{{ route('musicas-destroy', ['id' => $musica->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta música?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none" aria-label="Deletar música">
                                        <i class="bi bi-trash3-fill"></i> Deletar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-6 py-4">Nenhuma música encontrada</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
    <div class="mt-6">
        {{ $musicas->links() }}
    </div>

    
    <div class="mt-6">
        <a href="{{ route('musicas-create') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none">
            <i class="bi bi-plus-lg"></i> Adicionar Música
        </a>
    </div>

</div>
@endsection
