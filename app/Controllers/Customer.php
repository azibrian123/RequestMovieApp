<?php

namespace App\Controllers;

class Customer extends BaseController
{
    public function index(): string
    {
        return view('customer/index');
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function customer(): string
    {
        return view('customer/index');
    }
}
