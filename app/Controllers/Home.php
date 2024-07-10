<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }

    public function register(): string
    {
        return view('auth/register');
    }

    public function admin(): string
    {
        return view('admin/index');
    }

    public function customer(): string
    {
        return view('customer/index');
    }
}
