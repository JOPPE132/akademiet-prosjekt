<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function registration() {
        return view('register');
    }

    public function loginform() {
        return view ('login');
    }

    public function register(Request $request) {
        $incommingFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => 'required',
            'password' => ['required', 'min:8', 'max:20'],
            'town' => 'required'
        ]);

        $incommingFields['password'] = bcrypt($incommingFields['password']);

        $user = User::create($incommingFields);
        auth()->login($user);
        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginemail' => ['required', 'email'],
            'loginpassword' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Du er nå innlogget!');
        }
    
        return back()->withErrors([
            'login' => 'Brukerdetaljene matcher ikke.',
        ])->onlyInput('loginemail');
    }
}
