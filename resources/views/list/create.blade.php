<x-layout>
    <x-slot:title>Add a person</x-slot:title>
    <h1>Add a person you want to slime</h1>
    <form action="/list/create" method="post">
        @csrf
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <label>Name: <input name="first_name" value="{{ old('first_name', '') }}"></label>
        <label>Surname: <input name="last_name" value="{{ old('last_name', '') }}"></label>
        <label>Reason: <textarea name="reason" rows="4"></textarea></label>
        <label>Estimated date: <input type="date" name="estimated_date" value="{{ old('estimated_date', '') }}"></label>
        <label>Slime type: <select name="slime">
            @foreach($slimes as $slime)
            <option value="{{ $slime->id }}">{{ $slime->name }}</option>
            @endforeach
        </select></label>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <button>Enter</button>
    </form>
</x-layout>