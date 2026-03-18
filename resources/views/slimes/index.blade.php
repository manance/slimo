<x-layout>
    <x-slot:title>Slimes</x-slot:title>
    <h1>All slime types:</h1>
    <ul>
        @foreach($slimes as $slime)
        <li><a href="/type/{{ $slime->id }}">{{ $slime->name }}</a></li>
        @endforeach
    </ul>
</x-layout>