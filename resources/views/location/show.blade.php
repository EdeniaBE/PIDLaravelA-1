<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une localité</h2>
    </x-slot>

    @if (! empty ($location))
        <article>
            <h1>{{$location->designation}}</h1>
            <address>
                <p>{{ $location->address }}</p>
                <p>
                    {{ $location->locality->postal_code }}
                    {{ $location->locality->locality }}
                </p>

                @if ($location->website)
                    <p><a href="{{ $location->website }}" target="_blank">{{ $location->website }}</a></p>
                @else
                    <p>Pas de site web</p>
                @endif

                @if ($location->phone)
                    <p><a href="tel:{{ $location->phone }}">{{ $location->phone }}</a></p>
                @else
                    <p>Pas de téléphone</p>
                @endif
            </address>

            <h2>Liste des spectacles</h2>
            <ul>
                @foreach ($location->shows as $show)
                    <li>{{ $show->title }}</li>
                @endforeach
            </ul>
        </article>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('location_index') }}">Retour à l'index</a></nav>
</x-app-layout>
