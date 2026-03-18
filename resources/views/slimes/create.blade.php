<x-layout>
    <x-slot:title>Add slimes</x-slot:title>
    <h1>Add a slime type</h1>
    <form action="/add-type" method="post">
        @csrf
        <label>Slime name: <input type="text" name="name" value="{{ old('name', '') }}"></label>
        <button>Submit</button>
    </form>
</x-layout>