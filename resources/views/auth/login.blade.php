@extends('layouts.app')

@section('title', 'Login')

@section('content')
    
    <section class="h-screen flex justify-center items-center bg-white">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto">
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Faça seu login</h2>

           
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Senha</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-500 focus:ring-blue-500 rounded">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Lembrar senha</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Esqueceu sua senha?</a>
                </div>

                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Entrar</button>
            </form>
            <div class="text-center mt-6">
            <p class="text-sm text-gray-600">Novo por aqui? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Cadastre-se</a></p>
            </div>
        </div>
    </section>
@endsection
