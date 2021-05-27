<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un spectacle</h2>
    </x-slot>

    @if (! empty ($show))
        <article>
            <h1 class="text-xl font-bold">{{$show->title}}</h1>
            <br/>
            @if ($show->poster_url)
                <p><img src="{{ asset('images/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200" ></p>
            @else
                <canvas class="border-gray-900 border-1" width="200" height="100"></canvas>
            @endif

            @if ($show->location)
                <p><strong>Lieu de création:</strong> {{ $show->location->designation }}</p>
            @endif

            <p><strong>Prix:</strong> {{ $show->price }} </p>

            @if ($show->bookable)
                <p><em>Réservable</em></p>
            @else
                <p><em>Non réservable</em></p>
            @endif
            <br/>
            <h2 class="text-lg" >Liste des représentations</h2>
            @if($show->representations->count()==1)
                <ul>
                    @foreach ($show->representations as $representation)
                        <li>
                            {{ $representation->when }}
                            @if($representation->location)
                                {{ $representation->location->designation }}
                            @elseif ($representation->show->location)
                                {{ $representation->show->location->designation }}
                            @else
                                (lieu à déterminer)
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Aucune représentation</p>
            @endif
            <br/>
            <h2 class="text-lg">Liste des artistes</h2>
            <p>
                <strong>Auteur:</strong>
                @foreach ($collaborateurs['auteur'] as $auteur)
                    {{ $auteur->firstname }}
                    {{ $auteur->lastname }}
                    @if($loop->iteration == $loop->count-1) et
                    @elseif(!$loop->last),
                    @endif
                @endforeach
            </p>
            <p>
                <strong>Metteur en scène:</strong>
                @foreach ($collaborateurs['scénographe'] as $scenographe)
                    {{ $scenographe->firstname }}
                    {{ $scenographe->lastname }}
                    @if($loop->iteration == $loop->count-1) et
                    @elseif(!$loop->last),
                    @endif
                @endforeach
            </p>
            <p>
                <strong>Distribution:</strong>
                @foreach ($collaborateurs['comédien'] as $comedien)
                    {{ $comedien->firstname }}
                    {{ $comedien->lastname }}
                    @if($loop->iteration == $loop->count-1) et
                    @elseif(!$loop->last),
                    @endif
                @endforeach
            </p>
        </article>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <br/>
    <nav><a class="hover:text-blue-600" href="{{ route('show_index') }}">Retour à l'index</a></nav>
</x-app-layout>
