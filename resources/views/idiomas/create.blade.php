@extends('layouts.app')
@section('title', 'Incluir Idioma')

@section('content')
<div class="container mx-auto mt-8 px-4">
   
    <div class="mb-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800">Incluir Novo Idioma</h1>
        <hr class="my-4 border-gray-300">
    </div>

   
    <form action="{{ route('idiomas-store') }}" method="POST">
        @csrf

        
        <div class="mb-6">
            <label for="idioma" class="block text-lg font-medium text-gray-700">Idioma:</label>
            <input 
                type="text" 
                name="idioma" 
                id="idioma" 
                value="{{ old('idioma') }}" 
                placeholder="Digite o idioma..."
                required
                class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
            @error('idioma')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="flex justify-between items-center mt-6">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="bi bi-check-circle-fill"></i> Salvar
            </button>
            <a href="{{ route('idiomas-index') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                <i class="bi bi-x-circle-fill"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
