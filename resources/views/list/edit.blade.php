<x-layout>
    <x-slot:title>Edit person</x-slot:title>
    <h1>Edit the person you want to slime!</h1>
    <form action="/list/{{ $list->id }}" method="post">
        @csrf
        @method("put")
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <label>Name: <input name="first_name" value="{{ old('first_name', $list->first_name) }}"></label>
        <label>Surname: <input name="last_name" value="{{ old('last_name', $list->last_name) }}"></label>
        <label>Estimated date: <input type="date" name="estimated_date" value="{{ old('date', $list->estimated_date) }}"></label>
        <label><select name="slime">
            @foreach($slimes as $slime)
            <option value="{{ $slime->id }}" >{{ $slime->name }}</option>
            @endforeach
        </select></label>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <button>Save</button>
    </form>
</x-layout>