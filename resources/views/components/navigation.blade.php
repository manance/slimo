<header>
    <nav class="navbar-wrapper">
        <ul class="nav-links">
            @guest
            <li><a href="/">Welcome</a></li>
            <li><a href="/register">Register</a></li>
            <li><a href="/login">Login</a></li>
            @endguest
            @auth
            <li><a href="/profile">Profile</a></li>
            <li><a href="/list">Full list</a></li>
            <li><a href="/list/create">Add a person</a></li>
            <li><a href="/type">Slime types</a></li>
            <li><a href="/type/create">Add a slime type</a></li>
            <li><a href="/history">History</a></li>
            @endauth
        </ul>
        <div class="slime-drip">
        <svg viewBox="0 0 1440 180" preserveAspectRatio="none">
            <path d="M0,0 L1440,0 L1440,40 
                     C1380,40 1350,140 1280,140 
                     C1210,140 1180,40 1100,40 
                     C1020,40 1000,180 900,180 
                     C800,180 780,40 700,40 
                     C620,40 600,160 520,160 
                     C440,160 420,40 340,40 
                     C260,40 240,120 160,120 
                     C80,120 60,40 0,40 Z" fill="#6c75f9">                 
            </path>
        </svg>
    </div>
    </nav>
</header>