<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return redirect('login');
    }

    public function register()
    {

    }
}