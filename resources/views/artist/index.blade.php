<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
        @foreach($artists as $artist)
            <tr>
                <td>{{ $artist->firstname }}</td>
                <td>
                    <a class="hover:text-blue-600" href="{{ route('artist_show', $artist->id) }}">{{ $artist->lastname }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</x-app-layout>
