<x-app-layout>
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Digite o nome do usuario">
        <input type="email" name="email" placeholder="Digite o email do usuario">
        <input type="password" name="senha" placeholder="Digite a senha do usuario">
        <button type="submit">Enviar</button>
    </form>
</x-app-layout>
