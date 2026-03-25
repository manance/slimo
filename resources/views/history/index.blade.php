<x-layout>
    <x-slot:title>History</x-slot:title>
    <h1>History</h1>
    <ul>
        @foreach($people as $person)
        <li>{{ $person->name }}</li>
        @endforeach
    </ul>
</x-layout>