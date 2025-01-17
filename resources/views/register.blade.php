@extends('layouts.app')

@section('content')
<div class="registration-container">
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
                        @error('lastname')
                        <p style="margin:5px 0; color:red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-input">
                    <label for="email">E-post</label>
                    <input type="text" name="email" id="email" placeholder="Olanormann@domene.no" value="{{old('email')}}">
                    @error('email')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="phone">Telefon</label>
                    <input type="text" name="phone" id="phone" placeholder="48056693" value="{{old('phone')}}">
                    @error('phone')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="password">Passord</label>
                    <div class="password-container">
                        <input type="password" name="password" id="password" placeholder="Passord">
                        <span class="toggle-password" onclick="togglePasswordVisibility('password')">&#128065;</span>
                    </div>
                    @error('password')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="password_confirmation">Bekreft Passord</label>
                    <div class="password-container">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Bekreft Passord">
                        <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation')">&#128065;</span>
                    </div>
                    @error('password_confirmation')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <label for="town">By</label>
                    <input type="text" name="town" id="town" placeholder="Ålesund" value="{{old('town')}}">
                    @error('town')
                    <p style="margin:5px 0; color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-input">
                    <button type="submit">Registrer</button>
                </div>
            </form>
        </div>
</div>
<script src="{{ asset('js/registration.js')}}"></script>
@endsection