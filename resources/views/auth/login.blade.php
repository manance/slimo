<x-layout>
    <x-slot:title>Login</x-slot:title>
    <h1>Login to your acount</h1>
    <form action="/login" method="POST">
        @csrf
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <label>Name: <input name="name"></label>
        <label>Password: <input type="password" name="password"></label>
        <button>Login</button>
    </form>
</x-layout>