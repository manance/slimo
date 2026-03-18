<x-layout>
    <x-slot:title>{{ $list->first_name }} {{ $list->last_name }}</x-slot:title>
    <a href="/list/{{ $list->id }}/edit">Edit</a>
    <form action="/list/{{ $list->id }}" method="post">
        @csrf
        @method("delete")
        <button>Remove</button>
    </form>
</x-layout>