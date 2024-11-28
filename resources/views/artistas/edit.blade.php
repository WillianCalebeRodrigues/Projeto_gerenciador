@extends('layouts.app')
@section('title', 'Editar Artista')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Editar Artista</h1>
        <hr class="my-4 border-t-2 border-gray-300 w-1/4 mx-auto">
    </div>

    <form action="{{ route('artistas-update', $artista->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        
        <div class="mb-6">
            <label for="nome_artista" class="block text-lg font-medium text-gray-700">Nome do Artista:</label>
            <input 
                type="text" 
                name="nome_artista" 
                id="nome_artista" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('nome_artista') border-red-500 @enderror" 
                value="{{ old('nome_artista', $artista->nome_artista) }}" 
                required
            >
            @error('nome_artista')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="mb-6">
            <label for="nacionalidade" class="block text-lg font-medium text-gray-700">Nacionalidade:</label>
            <input 
                type="text" 
                name="nacionalidade" 
                id="nacionalidade" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('nacionalidade') border-red-500 @enderror" 
                value="{{ old('nacionalidade', $artista->nacionalidade) }}" 
                required
            >
            @error('nacionalidade')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

       
        <div class="mb-6">
            <label for="genero_artista" class="block text-lg font-medium text-gray-700">Gênero Musical:</label>
            <select 
                name="genero_artista" 
                id="genero_artista" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('genero_artista') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione um gênero</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('genero_artista', $artista->genero_artista) == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nome_genero }}
                    </option>
                @endforeach
            </select>
            @error('genero_artista')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
                <i class="bi bi-check-circle-fill"></i> Salvar Alterações
            </button>
            <a href="{{ route('artistas-index') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <i class="bi bi-x-circle-fill"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
