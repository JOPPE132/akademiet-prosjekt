@extends('layouts.app')

@section('content')
<div class="login-container">
    <h2>Logg inn</h2>
        <div class="flex-container">
            <form action="/login" method="POST" class="form-container">
                @csrf
                <div class="form-input">
                    <div class="form-input-email">
                        <label for="email">E-post</label>
                        <input type="text" name="loginemail" id="loginemail" placeholder="Olanormann@domene.no" value="{{ old('loginemail') }}">
                        @error('loginemail')
                        <p style="margin: 5px 0; color: red;">{{ $message }}</p>
                        @enderror
                        @if ($errors->has('login'))
                        <p style="margin: 5px 0; color: red;">{{ $errors->first('login') }}</p>
                        @endif
                    </div>
                    <div class="form-input-password">
                        <label for="password">Passord</label>
                        <div class="password-container">
                            <input type="password" name="loginpassword" id="loginpassword" placeholder="Passord">
                            <span class="toggle-password" onclick="togglePasswordVisibility('loginpassword')">&#128065;</span>
                        </div>
                            @error('loginpassword')
                            <p style="margin: 5px 0; color: red;">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-input">
                        <button type="submit">Logg inn</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<script src="{{ asset('js/login.js')}}"></script>
@endsection