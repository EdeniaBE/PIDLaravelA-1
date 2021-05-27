<x-app-layout>
    <x-slot name="header">
    <h1> Liste des {{$resource}} </h1>
    </x-slot>

    <table>
        <thead>
            <tr>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>
                        <a class="hover:text-blue-600" href="{{ route('role_show', $role->id)}}">{{$role->role }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
