@extends('layouts.app')
@section('title', 'Editar Musica')

@section('content')
<div class="container mx-auto mt-8 px-4">
    
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Editar Música</h1>
        <hr class="my-4">
    </div>

    <form action="{{ route('musicas-update', $musica->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mb-4">
            <label for="musica_nome" class="block text-gray-700 font-semibold">Nome da música:</label>
            <input 
                type="text" 
                class="w-full p-3 border border-gray-300 rounded-md @error('musica_nome') border-red-500 @enderror" 
                name="musica_nome" 
                id="musica_nome" 
                placeholder="Digite o nome da música..." 
                value="{{ old('musica_nome', $musica->musica_nome) }}" 
                required
            >
            @error('musica_nome')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="musica_artista" class="block text-gray-700 font-semibold">Artista:</label>
            <select 
                name="musica_artista" 
                id="musica_artista" 
                class="w-full p-3 border border-gray-300 rounded-md @error('musica_artista') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione o Artista</option>
                @foreach ($artistas as $artista)
                    <option value="{{ $artista->id }}" 
                        {{ old('musica_artista', $musica->musica_artista) == $artista->id ? 'selected' : '' }}>
                        {{ $artista->nome_artista }}
                    </option>
                @endforeach
            </select>
            @error('musica_artista')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="musica_album" class="block text-gray-700 font-semibold">Álbum:</label>
            <select 
                name="musica_album" 
                id="musica_album" 
                class="w-full p-3 border border-gray-300 rounded-md @error('musica_album') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione o Álbum</option>
                @foreach ($albuns as $album)
                    <option value="{{ $album->id }}" 
                        {{ old('musica_album', $musica->musica_album) == $album->id ? 'selected' : '' }}>
                        {{ $album->nome_album }}
                    </option>
                @endforeach
            </select>
            @error('musica_album')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="musica_genero" class="block text-gray-700 font-semibold">Gênero:</label>
            <select 
                name="musica_genero" 
                id="musica_genero" 
                class="w-full p-3 border border-gray-300 rounded-md @error('musica_genero') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione o Gênero</option>
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}" 
                        {{ old('musica_genero', $musica->musica_genero) == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nome_genero }}
                    </option>
                @endforeach
            </select>
            @error('musica_genero')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="musica_idioma" class="block text-gray-700 font-semibold">Idioma:</label>
            <select 
                name="musica_idioma" 
                id="musica_idioma" 
                class="w-full p-3 border border-gray-300 rounded-md @error('musica_idioma') border-red-500 @enderror" 
                required
            >
                <option value="" disabled>Selecione o Idioma</option>
                @foreach ($idiomas as $idioma)
                    <option value="{{ $idioma->id }}" 
                        {{ old('musica_idioma', $musica->musica_idioma) == $idioma->id ? 'selected' : '' }}>
                        {{ $idioma->idioma }}
                    </option>
                @endforeach
            </select>
            @error('musica_idioma')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="musica_link" class="block text-gray-700 font-semibold">Link:</label>
            <input 
                type="url" 
                class="w-full p-3 border border-gray-300 rounded-md @error('musica_link') border-red-500 @enderror" 
                name="musica_link" 
                id="musica_link" 
                placeholder="Informe o link..." 
                value="{{ old('musica_link', $musica->musica_link) }}" 
                required
            >
            @error('musica_link')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none">
                <i class="bi bi-check-circle-fill"></i> Salvar Alterações
            </button>
            <a href="{{ route('musicas-index') }}" class="px-6 py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none">
                <i class="bi bi-x-circle-fill"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
