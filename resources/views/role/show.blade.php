<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un role</h2>
    </x-slot>

    @if (!empty ($role))
        <h1> {{ $role->role}} </h1>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <nav><a class="hover:text-blue-600" href="{{route('role_index') }}">Retour à l'index</a></nav>
</x-app-layout>
