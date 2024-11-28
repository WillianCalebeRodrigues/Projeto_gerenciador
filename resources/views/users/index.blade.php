<x-app-layout>
    <style>
        .container {
            background-color: white;
        }
    </style>

<div class="container">
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
        </tr>
        <br>
    @endforeach
</div>


</x-app-layout>
