<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class RedirectToGitLabController extends Controller
{
    public function __invoke()
    {
        return Socialite::driver('gitlab')->scopes(['read_api'])->redirect();
    }
}
