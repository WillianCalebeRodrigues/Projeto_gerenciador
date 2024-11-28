@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    
    <div class="flex h-screen">

        
        <div class="bg-gray-800 text-white w-64 px-6 py-8">
            <div class="text-center mb-10">
               
                </a>
            </div>

            <nav>
                <ul>
                  
                    <li class="mb-6">
                        <a href="{{ route('musicas-index') }}" class="text-lg font-semibold text-gray-300 hover:text-white transition duration-300">
                            Músicas
                        </a>
                    </li>
                    
                   
                    <li class="mb-6">
                        <a href="{{ route('artistas-index') }}" class="text-lg font-semibold text-gray-300 hover:text-white transition duration-300">
                            Artistas
                        </a>
                    </li>

                    
                    <li class="mb-6">
                        <a href="{{ route('generos-index') }}" class="text-lg font-semibold text-gray-300 hover:text-white transition duration-300">
                            Gêneros
                        </a>
                    </li>


                    <li class="mb-6">
                        <a href="{{ route('albuns-index') }}" class="text-lg font-semibold text-gray-300 hover:text-white transition duration-300">
                            Albuns
                        </a>
                    </li>


                    <li class="mb-6">
                        <a href="{{ route('idiomas-index') }}" class="text-lg font-semibold text-gray-300 hover:text-white transition duration-300">
                            Idiomas
                        </a>
                    </li>
                    
                </ul>
            </nav>
        </div>

        
        <div class="flex-1 bg-gray-100 p-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Menu inicial</h1>
            
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p class="text-lg text-gray-700 mb-4">Bem-vindo ao menu inicial! Selecione uma das opções abaixo para gerenciar as tabelas:</p>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('musicas-index') }}" class="text-xl text-blue-600 hover:text-blue-800">
                            Gerenciar Músicas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('artistas-index') }}" class="text-xl text-blue-600 hover:text-blue-800">
                            Gerenciar Artistas
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('generos-index') }}" class="text-xl text-blue-600 hover:text-blue-800">
                            Gerenciar Gêneros
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('albuns-index') }}" class="text-xl text-blue-600 hover:text-blue-800">
                            Gerenciar Albuns
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('idiomas-index') }}" class="text-xl text-blue-600 hover:text-blue-800">
                            Gerenciar Idiomas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
