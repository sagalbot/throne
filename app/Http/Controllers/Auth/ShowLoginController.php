<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowLoginController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Login');
    }
}
