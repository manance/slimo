<x-layout>
    <x-slot:title>Register</x-slot:title>
    <x-slot:css>auth.css</x-slot:css>
    <div class="container">
        <div class="register">
            <h1>Create a profile</h1>
            <form action="/register" method="POST">
                @csrf
                
                <label>Name: <br><input name="name" value="{{ old("name", "") }}"></label>
                <label>Email: <br><input type="email" name="email" value="{{ old("email", "") }}"></label>
                <label>Password: <br><input type="password" name="password"></label>
                <label>Confirm password: <br><input type="password" name="password_confirmation"></label>
                <button>Register</button>
            </form>
        </div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif    
    </div>
</x-layout>