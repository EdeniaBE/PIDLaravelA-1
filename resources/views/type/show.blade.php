<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un type</h2>
    </x-slot>
    @if (!empty ($type))
        <h1> {{ $type->type}} </h1>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <nav><a class="hover:text-blue-600" href="{{route('type_index') }}">Retour à l'index</a></nav>
</x-app-layout>
