@extends('layouts.app')
@section('title', 'Incluir Gênero')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold text-gray-800">Incluir Novo Gênero</h1>
        <hr class="my-4 border-t-2 border-gray-300 w-1/4 mx-auto">
    </div>

    <form action="{{ route('generos-store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf

       
        <div class="mb-6">
            <label for="nome_genero" class="block text-lg font-medium text-gray-700">Nome do Gênero:</label>
            <input 
                type="text" 
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent @error('nome_genero') border-red-500 @enderror" 
                name="nome_genero" 
                id="nome_genero" 
                placeholder="Digite o nome do gênero..." 
                value="{{ old('nome_genero') }}" 
                required
            >
            @error('nome_genero')
                <p class="mt-2 text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                <i class="bi bi-check-circle-fill"></i> Salvar
            </button>
            <a href="{{ route('generos-index') }}" class="px-6 py-2 bg-gray-500 text-white font-semibold rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <i class="bi bi-x-circle-fill"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
