<x-layout>
    <x-slot:title>Slimes</x-slot:title>
    <h1>All slime types:</h1>
    @foreach($slimes as $slime)
    <p>{{ $slime->name }}</p>
    @endforeach
</x-layout>