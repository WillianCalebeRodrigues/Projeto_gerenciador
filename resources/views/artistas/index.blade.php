@extends('layouts.app')
@section('title', 'Listagem de Artistas')

@section('content')
<div class="container mx-auto mt-8 px-4">

    
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Listagem de Artistas</h1>
    </div>

    
    <div class="mb-6">
        <form action="{{ route('artistas-index') }}" method="GET" class="flex flex-wrap items-center justify-between space-y-4 md:space-y-0">
            
            <input 
                type="text" 
                name="search" 
                placeholder="Pesquisar artistas..." 
                value="{{ request('search') }}"
                class="w-full md:w-2/3 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
            
            
            <select 
                name="sort_by" 
                class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
            >
                <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Ordenar por ID</option>
                <option value="nome_artista" {{ request('sort_by') == 'nome_artista' ? 'selected' : '' }}>Ordenar por Nome</option>
                <option value="nacionalidade" {{ request('sort_by') == 'nacionalidade' ? 'selected' : '' }}>Ordenar por Nacionalidade</option>
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
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Nome</th>
                    <th class="px-6 py-4 text-left">Nacionalidade</th>
                    <th class="px-6 py-4 text-left">Gênero</th>
                    <th class="px-6 py-4 text-center">Editar/Deletar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artistas as $artista)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $artista->id }}</td>
                        <td class="px-6 py-4">{{ $artista->nome_artista }}</td>
                        <td class="px-6 py-4">{{ $artista->nacionalidade }}</td>
                        <td class="px-6 py-4">{{ $artista->genero->nome_genero ?? 'Não especificado' }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center items-center space-x-2">
                                
                                <a href="{{ route('artistas-edit', ['id' => $artista->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none" aria-label="Editar artista">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>

                               
                                <form action="{{ route('artistas-destroy', ['id' => $artista->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este artista?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none" aria-label="Deletar artista">
                                        <i class="bi bi-trash3-fill"></i> Deletar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4">Nenhum artista encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    
    <div class="mt-6">
        {{ $artistas->links() }}
    </div>

    
    <div class="mt-6">
        <a href="{{ route('artistas-create') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none">
            <i class="bi bi-plus-lg"></i> Adicionar Artista
        </a>
    </div>

</div>
@endsection
