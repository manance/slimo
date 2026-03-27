<x-layout>
    <x-slot:title>Login</x-slot:title>
    <x-slot:css>auth.css</x-slot:css>
    <div class="container">
        <div class="login">
            <h1>Login to your acount</h1>
            <form action="/login" method="POST">
                @csrf
                
                <label>Name: <input name="name"></label>
                <label>Password: <input type="password" name="password"></label>
                <button class="login_enter">Login</button>
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