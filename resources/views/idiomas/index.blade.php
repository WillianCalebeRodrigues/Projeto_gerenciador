@extends('layouts.app')
@section('title', 'Listagem de Idiomas')

@section('content')
<div class="container mx-auto mt-8 px-4">

    
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Listagem de Idiomas</h1>
    </div>

   
    <div class="mb-6">
        <form method="GET" action="{{ route('idiomas-index') }}" class="flex flex-wrap items-center justify-between space-y-4 md:space-y-0">
            
            <input 
                type="text" 
                name="search" 
                placeholder="Pesquisar por nome..." 
                value="{{ request('search') }}" 
                class="w-full md:w-2/3 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
            />

            
            <select 
                name="sort_by" 
                class="w-full md:w-1/4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300"
            >
                <option value="id" {{ request('sort_by') == 'id' ? 'selected' : '' }}>Ordenar por ID</option>
                <option value="idioma" {{ request('sort_by') == 'idioma' ? 'selected' : '' }}>Ordenar por Nome</option>
            </select>

            
            <button 
                type="submit" 
                class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none"
            >
                Filtrar
            </button>
        </form>
    </div>

    
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Nome</th>
                    <th class="px-6 py-4 text-center">Editar/Deletar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($idiomas as $idioma)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $idioma->id }}</td>
                        <td class="px-6 py-4">{{ $idioma->idioma }}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center items-center space-x-2">
                               
                                <a href="{{ route('idiomas-edit', ['id' => $idioma->id]) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <i class="bi bi-pencil-fill"></i> Editar
                                </a>

                               
                                <form action="{{ route('idiomas-destroy', ['id' => $idioma->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este idioma?')">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <i class="bi bi-trash3-fill"></i> Deletar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-center text-gray-500">Nenhum idioma encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

   
    <div class="mt-6">
        {{ $idiomas->links() }}
    </div>

    
    <div class="mt-6 text-start">
        <a href="{{ route('idiomas-create') }}" class="px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            <i class="bi bi-plus-lg"></i> Adicionar Novo Idioma
        </a>
    </div>

</div>
@endsection
