@extends('layouts.app')

@section('title', 'Home')

@section('content')
    
    <header class="relative bg-white h-96"> 
        
        <div class="absolute inset-0 bg-black opacity-0"></div>

        <div class="container mx-auto flex justify-center items-center h-full px-6 text-center relative">
            <h1 class="text-5xl font-extrabold leading-tight text-gray-800 shadow-lg">
                Bem-vindo ao SongStation!
            </h1>
        </div>
    </header>

    <section class="py-16 bg-gray-800">
        <div class="container mx-auto text-center text-white px-6">
            <h2 class="text-4xl font-semibold mb-6">Gerencie suas músicas com facilidade</h2>
            <p class="text-xl max-w-3xl mx-auto mb-8">
            Gerencie suas músicas e simplifique sua experiência. Organize seus álbuns, artistas e músicas favoritas em um lugar só seu com a SongStation, sua estação de música pessoal!
            </p>
            <a href="http://127.0.0.1:8000/login" class="px-6 py-3 bg-gray-600 text-white text-lg font-semibold rounded-full hover:bg-gray-500 transition duration-300">
                Acesse agora
            </a>
        </div>
    </section>

    <section id="features" class="py-16 bg-gray-100">
        <div class="container mx-auto text-center px-6">
            <h2 class="text-3xl font-semibold text-gray-800 mb-8">Funcionalidades principais</h2>

            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white shadow-lg rounded-lg p-8 hover:shadow-xl transition duration-300">
                    <div class="text-4xl text-gray-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-16 h-16 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v18l15-9-15-9z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Organização fácil</h3>
                    <p class="text-lg text-gray-600">
                        Organize suas músicas em listas de reprodução personalizadas para um acesso rápido e simples.
                    </p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-8 hover:shadow-xl transition duration-300">
                    <div class="text-4xl text-gray-600 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-16 h-16 mx-auto">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 12h10M7 17h10" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Interface intuitiva</h3>
                    <p class="text-lg text-gray-600">
                        Navegue facilmente pela plataforma e encontre suas músicas preferidas com poucos cliques.
                    </p>
                </div>
    </section>

    <footer class="py-8 bg-gray-900 text-center text-gray-400">
        <p class="text-sm">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </p>
    </footer>
@endsection
