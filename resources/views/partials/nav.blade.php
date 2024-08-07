<nav class="navbar">
    <ul class="nav-list">
        <li class="nav-item"><a href="/">Hjem</a></li>
            <div class="nav-right">
                @guest
                <li class="nav-item"><a href="/register">Registrer</a></li>
                <li class="nav-item"><a href="/login">Logg inn</a></li>
                @endguest

                @auth
                <li class="nav-item"><a>Hei, {{ Auth::user()->firstname }}</a></li>
                <li class="nav-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logg ut</a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
                @endauth
            </div>
        </ul>
    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
</nav>