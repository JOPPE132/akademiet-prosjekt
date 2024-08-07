<?php

namespace App\Http\Controllers;

/**
 * HomeController provides a view function.
 */
class HomeController extends Controller
{
    /**
     * Returns the home page(index) for a route.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('index');
    }
}
