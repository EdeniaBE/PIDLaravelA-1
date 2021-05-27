<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <table>
        <thead>
            <tr>
                <th>Localités</th>
                <th>Code Postal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($localities as $locality)
            <tr>
                <td>{{ $locality->locality }}</td>
                <td>
                    <a class="hover:text-blue-600" href="{{ route('locality_show', $locality->id) }}">{{ $locality->postal_code }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>

