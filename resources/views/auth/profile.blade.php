<x-layout>
    <x-slot:title>Profile</x-slot:title>
    <form class="form" method="POST" action="/logout">
        @csrf
        @method('delete')
        <button>Logout</button>
    </form>
</x-layout>