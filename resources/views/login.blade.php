<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>

    <nav class="navbar">
        <ul class="nav-list">
            <li class="nav-item"><a href="/">Hjem</a></li>
            <div class="nav-right">
                <li class="nav-item"><a href="/register">Register</a></li>
                <li class="nav-item"><a href="/login">Logg inn</a></li>
            </div>
        </ul>
    </nav>

    <div class="container">
    <h2>Logg inn</h2>
    <div class="flex-container">
        <form action="/login" method="POST" class="form-container">
            @csrf
            <div class="form-input">
                <div class="form-input-email">
                    <label for="email">E-post</label>
                    <input type="text" name="loginemail" id="email" placeholder="Olanormann@domene.no" value="{{ old('loginemail') }}">
                    @error('loginemail')
                        <p style="margin: 5px 0; color: red;">{{ $message }}</p>
                    @enderror
                    @if ($errors->has('login'))
                    <p style="margin: 5px 0; color: red;">{{ $errors->first('login') }}</p>
                    @endif
                </div>
                <div class="form-input-password">
                    <label for="password">Passord</label>
                    <input type="password" name="loginpassword" id="password" placeholder="Passord">
                </div>
                <div class="form-input">
                    <button type="submit">Logg inn</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>