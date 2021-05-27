<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un artiste</h2>
    </x-slot>
    @if (! empty ($artist))
        <h1 class="text-xl font-bold">{{ $artist->firstname }} {{ $artist->lastname }}</h1>
        <br/>
        <h2 class="text-lg">Liste des types</h2>
        <ul>
            @foreach ($artist->types as $type)
                <li>{{ $type->type }}</li>
            @endforeach
        </ul>

        <div><a href="{{ route('artist_edit' ,$artist->id) }}">Modifier</a></div>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <br/>
    <nav><a class="hover:text-blue-600" href="{{ route('artist_index') }}">Retour à l'index</a></nav>
</x-app-layout>
