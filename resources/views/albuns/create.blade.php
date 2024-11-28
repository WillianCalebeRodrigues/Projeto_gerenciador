@extends('layouts.app')
@section('title', 'Incluir Álbum')

@section('content')
<div class="container mx-auto mt-8 px-4">
    
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Incluir Novo Álbum</h1>
        <hr class="my-4 border-t-2 border-gray-300 w-1/4 mx-auto">
    </div>

    <form action="{{ route('albuns-store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        
        <div class="mb-6">
            <label for="nome_album" class="block text-lg font-medium text-gray-700">Nome do Álbum:</label>
            <input 
                type="text" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('nome_album') border-red-500 @enderror" 
                name="nome_album" 
                id="nome_album" 
                placeholder="Digite o nome do álbum..." 
                value="{{ old('nome_album') }}" 
                required
            >
            @error('nome_album')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="mb-6">
            <label for="album_artista" class="block text-lg font-medium text-gray-700">Artista:</label>
            <select 
                name="album_artista" 
                id="album_artista" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('album_artista') border-red-500 @enderror" 
                required
            >
                <option value="" selected disabled>Selecione o Artista</option>
                @forelse ($artistas as $artista)
                    <option value="{{ $artista->id }}" {{ old('album_artista') == $artista->id ? 'selected' : '' }}>{{ $artista->nome_artista }}</option>
                @empty
                    <option value="" disabled>Nenhum artista encontrado</option>
                @endforelse
            </select>
            @error('album_artista')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="mb-6">
            <label for="ano_lancamento" class="block text-lg font-medium text-gray-700">Ano de Lançamento:</label>
            <input 
                type="number" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('ano_lancamento') border-red-500 @enderror" 
                name="ano_lancamento" 
                id="ano_lancamento" 
                placeholder="Digite o ano de lançamento..." 
                value="{{ old('ano_lancamento') }}" 
                required
            >
            @error('ano_lancamento')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

       
        <div class="mb-6">
            <label for="album_genero" class="block text-lg font-medium text-gray-700">Gênero do Álbum:</label>
            <select 
                name="album_genero" 
                id="album_genero" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('album_genero') border-red-500 @enderror" 
                required
            >
                <option value="" selected disabled>Selecione o Gênero</option>
                @forelse ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('album_genero') == $genero->id ? 'selected' : '' }}>{{ $genero->nome_genero }}</option>
                @empty
                    <option value="" disabled>Nenhum gênero encontrado</option>
                @endforelse
            </select>
            @error('album_genero')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="mb-6">
            <label for="album_idioma" class="block text-lg font-medium text-gray-700">Idioma:</label>
            <select 
                name="album_idioma" 
                id="album_idioma" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('album_idioma') border-red-500 @enderror" 
                required
            >
                <option value="" selected disabled>Selecione o Idioma</option>
                @forelse ($idiomas as $idioma)
                    <option value="{{ $idioma->id }}" {{ old('album_idioma') == $idioma->id ? 'selected' : '' }}>{{ $idioma->idioma }}</option>
                @empty
                    <option value="" disabled>Nenhum idioma encontrado</option>
                @endforelse
            </select>
            @error('album_idioma')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                <i class="bi bi-check-circle-fill mr-2"></i> Salvar
            </button>
            <a href="{{ route('albuns-index') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <i class="bi bi-x-circle-fill mr-2"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
