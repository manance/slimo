<x-layout>
    <x-slot:title>Full list</x-slot:title>
    <h1>List of people you want to slime:</h1>
    @foreach($slimes as $slime)
    <p>{{ $slime->fist_name }}</p>
    @endforeach
</x-layout>