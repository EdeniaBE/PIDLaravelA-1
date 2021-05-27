<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <ul>
        @foreach($representations as $representation)
            <li>
                <a class="hover:text-blue-600" href="{{ route('representation_show', $representation->id) }}">{{ $representation->show->title }}</a>
                @if($representation->location)
                    <span>{{ $representation->location->designation }}</span>
                @endif
                <datetime> {{ substr($representation->when,0,-3) }}</datetime>
            </li>
        @endforeach
    </ul>
</x-app-layout>

