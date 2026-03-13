<x-layout>
    <x-slot:title>Login</x-slot:title>
    <h1>Login to your acount</h1>
    <form action="/login" method="POST">
        @csrf
        <label>Name: <input name="name"></label>
        <label>Password: <input type="password" name="password"></label>
        <button>Login</button>
    </form>
</x-layout>