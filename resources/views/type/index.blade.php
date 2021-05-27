<x-app-layout>

    <x-slot name="header">
        <h1> Liste des {{$resource}} </h1>
    </x-slot>

    <table>
        <thead>
            <tr>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td>
                        <a class="hover:text-blue-600" href="{{ route('type_show', $type->id)}}">{{$type->type }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
