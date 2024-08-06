<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

/**
 * Summary of UserController
 */
class UserController extends Controller
{
    /**
     * Summary of registration
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registration() {
        return view('register');
    }

    /**
     * Summary of loginform
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function loginform() {
        return view ('login');
    }

    /**
     * 
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
     * Summary of logoutd
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    /**
     * Summary of login
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
