<x-layout>
    <x-slot:title>Add a person</x-slot:title>
    <h1>Add a person you want to slime</h1>
    <form action="/create" method="post">
        @csrf
        <label>Name: <input name="first_name"></label>
        <label>Surname: <input name="last_name"></label>
        <label>Reason: <textarea name="reason" rows="4"></textarea></label>
        <label>Estimated date: <input type="date" name="estimated_date"></label>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="slime_type_id" value="1">
        <button>Enter</button>
    </form>
</x-layout>