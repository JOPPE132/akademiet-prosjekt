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
