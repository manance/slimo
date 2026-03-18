<x-layout>
    <x-slot:title>{{ $type->name }}</x-slot:title>
    <h1>{{ $type->name }}</h1>
    <h3>How many people affected: </h3>
    <p>{{ $type->affected_people }}</p>
    <h3>Rating: </h3>
    <p>{{ $type->rating }}</p>
    <a href="/type/{{ $type->id }}/edit">Edit</a>
    <form action="/type/{{ $type->id }}" method="post">
        @csrf
        @method("delete")
        <button>Delete</button>
    </form>
    <form action="/type/{{ $type->id }}" method="post">
        @csrf
        @method("put")
        <label>Rate this slime: <input type="number" name="rating" min="1" max="10"></label>
        <button>Submit</button>
    </form>
</x-layout>