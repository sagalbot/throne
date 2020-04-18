<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGitLabController extends Controller
{
    public function __invoke()
    {
        $user = Socialite::driver('gitlab')->user();

        $authUser = User::updateOrCreate(['id' => $user->getId()], [
            'token'        => $user->token,
            'refreshToken' => $user->refreshToken,
            'expiresIn'    => $user->expiresIn,
            'nickname'     => $user->getNickname(),
            'name'         => $user->getName(),
            'email'        => $user->getEmail(),
            'avatar'       => $user->getAvatar(),
        ]);

        Auth::loginUsingId($authUser->id, true);

        return redirect('/');
    }
}
