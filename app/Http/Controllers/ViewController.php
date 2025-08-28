<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{

    public function index()
    {
        return view('index');
    }
    public function category()
    {
        return view('category');
    }

    public function blog()
    {
        return view('blog');
    }

    public function singleblog()
    {
        return view('single-blog');
    }

    public function elements()
    {
        return view('elements');
    }

    public function tracking()
    {
        return view('tracking');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function product()
    {
        return view('single-product');
    }


    public function cart()
    {
        return view('cart');
    }

    public function login()
    {
        return view('auth.login');
    }


    public function register()
    {
        return view('auth.register');
    }
}
