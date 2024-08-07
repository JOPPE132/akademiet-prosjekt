<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

/**
 * UserController handles user registration, login and logout operations.
 */
class UserController extends Controller
{
    /**
     * Shows the user registration form.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration() {
        return view('register');
    }

    /**
     * Shows the user login form.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function loginform() {
        return view ('login');
    }

    /**
     * Registers a new user.
     * Validates the incoming request, creates a new user and logs them in. 
     * Redirects to home page.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => 'required',
            'password' => ['required', 'min:8', 'max:20', 'confirmed'],
            'town' => 'required'
        ]);
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
    
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
    

    /**
     * Logs the user out.
     * Logs out the currently authenticated user and redirects them to the home page.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    /**
     * Authenticate a user.
     * Validates the incoming login credentials and attemps to log in the user.
     * Redirects the user to the home page on successful authentication, or returns back
     * with an error message.
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'loginemail' => ['required', 'email'],
            'loginpassword' => 'required',
        ], [
            'loginemail.required' => 'The email field is required.',
            'loginemail.email' => 'The email must be a valid email address.',
            'loginpassword.required' => 'The password field is required.',
        ], [
            'loginemail' => 'email',
            'loginpassword' => 'password',
        ]);
    
        if (Auth::attempt(['email' => $incomingFields['loginemail'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/');
        }
    
        return back()->withErrors([
            'login' => 'E-mail or password does not match.',
        ])->onlyInput('loginemail');
    }
}
