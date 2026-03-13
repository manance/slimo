<x-layout>
    <x-slot:title>Register</x-slot:title>
    <h1>Create a profile</h1>
    <form action="/register" method="POST">
        @csrf
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <label>Name: <input name="name" value="{{ old("name", "") }}"></label>
        <label>Email: <input type="email" name="email" value="{{ old("email", "") }}"></label>
        <label>Password: <input type="password" name="password"></label>
        <label>Confirm password: <input type="password" name="password_confirmation"></label>
        <button>Register</button>
    </form>
</x-layout>