<x-layout>
    <x-slot:title>Add slimes</x-slot:title>
    <h1>Add a slime type</h1>
    <form action="/type/create" method="post">
        @csrf
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <label>Slime name: <input name="name" value="{{ old('name', '') }}"></label>
        <button>Submit</button>
    </form>
</x-layout>