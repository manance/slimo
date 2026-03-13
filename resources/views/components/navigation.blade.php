<header>
    <nav>
        <ul>
            @guest
            <li><a href="/">Welcome</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
            @endguest
            @auth
            <li><a href="/profile">Profile</a></li>
            <li><a href="/list">Full list</a></li>
            <li><a href="/create">Add a person</a></li>
            @endauth
        </ul>
    </nav>
</header>