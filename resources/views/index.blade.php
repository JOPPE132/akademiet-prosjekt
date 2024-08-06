<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
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

    <div class="container">
        <div class="search-bar">
            <label for="search">Søk etter sted</label>
            <input type="text" id="search" placeholder="Barcelona">
        </div>
        <div class="city-section-popular">
            <h2>Populære byer</h2>
            <table class="city-table">
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Trondheim</td>
                        <td class="trondheim"></td>
                        <td class="trondheim"></td>
                        <td class="trondheim"></td>
                    </tr>
                    <tr>
                        <td>Ålesund</td>
                        <td class="alesund"></td>
                        <td class="alesund"></td>
                        <td class="alesund"></td>
                    </tr>
                    <tr>
                        <td>Oslo</td>
                        <td class="oslo"></td>
                        <td class="oslo"></td>
                        <td class="oslo"></td>
                    </tr>
                    <tr>
                        <td>Bergen</td>
                        <td class="bergen"></td>
                        <td class="bergen"></td>
                        <td class="bergen"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="city-section-favorites">
            <h2>Dine favoritter</h2>
            <table class="city-table">
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script src="{{ asset('js/index.js')}}"></script>
</body>
</html>