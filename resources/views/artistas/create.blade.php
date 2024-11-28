@extends('layouts.app')
@section('title', 'Incluir Artista')

@section('content')
<div class="container mx-auto mt-8 px-4">
    
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Incluir Novo Artista</h1>
        <hr class="my-4">
    </div>

    <form action="{{ route('artistas-store') }}" method="POST">
        @csrf

       
        <div class="mb-4">
            <label for="nome_artista" class="block text-gray-700 font-semibold">Nome do Artista:</label>
            <input 
                type="text" 
                class="w-full p-3 border border-gray-300 rounded-md @error('nome_artista') border-red-500 @enderror" 
                name="nome_artista" 
                id="nome_artista" 
                placeholder="Digite o nome do artista..." 
                value="{{ old('nome_artista') }}" 
                required
            >
            @error('nome_artista')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="nacionalidade" class="block text-gray-700 font-semibold">Nacionalidade:</label>
            <input 
                type="text" 
                class="w-full p-3 border border-gray-300 rounded-md @error('nacionalidade') border-red-500 @enderror" 
                name="nacionalidade" 
                id="nacionalidade" 
                placeholder="Digite a nacionalidade..." 
                value="{{ old('nacionalidade') }}" 
                required
            >
            @error('nacionalidade')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="mb-4">
            <label for="genero_artista" class="block text-gray-700 font-semibold">Gênero Musical:</label>
            <select 
                name="genero_artista" 
                id="genero_artista" 
                class="w-full p-3 border border-gray-300 rounded-md @error('genero_artista') border-red-500 @enderror" 
                required
            >
                <option value="" selected disabled>Selecione o gênero</option>
                @forelse ($generos as $genero)
                    <option value="{{ $genero->id }}" {{ old('genero_artista') == $genero->id ? 'selected' : '' }}>
                        {{ $genero->nome_genero }}
                    </option>
                @empty
                    <option value="" disabled>Nenhum gênero encontrado</option>
                @endforelse
            </select>
            @error('genero_artista')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none">
                <i class="bi bi-check-circle-fill"></i> Salvar
            </button>
            <a href="{{ route('artistas-index') }}" class="px-6 py-3 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none">
                <i class="bi bi-x-circle-fill"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
