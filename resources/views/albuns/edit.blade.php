@extends('layouts.app')
@section('title', 'Editar Álbum')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Editar Álbum</h1>
        <hr class="my-4 border-t-2 border-gray-300 w-1/4 mx-auto">
    </div>

    <form action="{{ route('albuns-update', $album->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

       
        <div class="mb-6">
            <label for="nome_album" class="block text-lg font-medium text-gray-700">Nome do Álbum:</label>
            <input 
                type="text" 
                name="nome_album" 
                id="nome_album" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('nome_album') border-red-500 @enderror" 
                value="{{ old('nome_album', $album->nome_album) }}" 
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
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('album_artista') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione um Artista</option>
                @foreach ($artistas as $artista)
                    <option value="{{ $artista->id }}" {{ old('album_artista', $album->album_artista) == $artista->id ? 'selected' : '' }}>
                        {{ $artista->nome_artista }}
                    </option>
                @endforeach
            </select>
            @error('album_artista')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

      
        <div class="mb-6">
            <label for="ano_lancamento" class="block text-lg font-medium text-gray-700">Ano de Lançamento:</label>
            <input 
                type="number" 
                name="ano_lancamento" 
                id="ano_lancamento" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('ano_lancamento') border-red-500 @enderror" 
                value="{{ old('ano_lancamento', $album->ano_lancamento) }}" 
                required
            >
            @error('ano_lancamento')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

    
        <div class="mb-6">
            <label for="album_genero" class="block text-lg font-medium text-gray-700">Gênero:</label>
            <select 
                name="album_genero" 
                id="album_genero" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('album_genero') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione o Gênero</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('album_genero', $album->album_genero) == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nome_genero }}
                    </option>
                @endforeach
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
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('album_idioma') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione o Idioma</option>
                @foreach ($idiomas as $idioma)
                    <option value="{{ $idioma->id }}" {{ old('album_idioma', $album->album_idioma) == $idioma->id ? 'selected' : '' }}>
                        {{ $idioma->idioma }}
                    </option>
                @endforeach
            </select>
            @error('album_idioma')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

       
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-600">
                <i class="bi bi-check-circle-fill"></i> Salvar Alterações
            </button>
            <a href="{{ route('albuns-index') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <i class="bi bi-x-circle-fill"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
