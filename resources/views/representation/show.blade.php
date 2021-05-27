<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une représentation</h2>
    </x-slot>

    @if (! empty ($representation))
        <article>
            <h1>Représentation du {{ $date }} à {{ $time }}</h1>
            <p><strong>Spectacle:</strong> {{ $representation->show->title }}</p>

            <p>
                <strong>Lieu:</strong>
                @if($representation->location)
                    {{ $representation->location->designation }}
                @elseif ($representation->show->location)
                    {{ $representation->show->location->designation}}
                @else
                    <em>à déterminer</em>
                @endif
            </p>
        </article>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('representation_index') }}">Retour à l'index</a></nav>
</x-app-layout>
