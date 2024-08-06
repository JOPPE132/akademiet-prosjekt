<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
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
        <h2>Registrer en ny bruker</h2>
        <div class="flex-container">
            <form action="/register" method="POST" class="form-container">
                @csrf
                <div class="form-input-name">
                    <div class="firstname">
                        <label for="firstname">Fornavn</label>
                        <input type="text" name="firstname" placeholder="Ola" value="{{old('firstname')}}">
                        @error('firstname')
                        <p style="margin:5px 0; color:red;">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="lastname">
                        <label for="lastname">Etternavn</label>
                        <input type="text" name="lastname" placeholder="Normann" value="{{old('lastname')}}">
                        @error('firstname')
                        <p style="margin:5px 0; color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-input">
                    <label for="email">E-post</label>
                    <input type="text" name="email" id="email" placeholder="Olanormann@domene.no" value="{{old('email')}}">
                    @error('firstname')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="phone">Telefon</label>
                    <input type="text" name="phone" id="phone" placeholder="48056693" value="{{old('phone')}}">
                    @error('firstname')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="password">Passord</label>
                    <input type="password" name="password" id="password" placeholder="Passord" value="{{old('password')}}">
                    @error('firstname')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="form-input">
                    <label for="town">By</label>
                    <input type="text" name="town" id="town" placeholder="Ålesund" value="{{old('town')}}">
                    @error('firstname')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <button type="submit">Registrer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>