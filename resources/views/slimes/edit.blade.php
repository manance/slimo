<x-layout>
    <x-slot:title>{{ $type->name }}</x-slot:title>
    <h1>{{ $type->name }}</h1>
    <h3>How many people affected: </h3>
    <p>{{ $type->affected_people }}</p>
    <h3>Rating: </h3>
    <p>{{ $type->rating }}</p>
</x-layout>