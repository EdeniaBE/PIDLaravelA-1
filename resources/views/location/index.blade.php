<x-app-layout>
    <x-slot name="header">
        <h1>Liste des lieux de spectacles</h1>
    </x-slot>
    <ul>
        @foreach($locations as $location)
            <li>
                <a href="{{ route('location_show', $location->id) }}">{{ $location->designation }}</a>
                @if($location->website)
                    <a class="hover:text-blue-600" href="{{ $location->website }}">{{ $location->website }}</a>
                @endif
            </li>
        @endforeach
    </ul>
</x-app-layout>

