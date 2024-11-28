<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    <td>{{ $usuario->id }}</td>
    <br>
    <td>{{ $usuario->name }}</td>
    <br>
    <td>{{ $usuario->email }}</td>
</form>
