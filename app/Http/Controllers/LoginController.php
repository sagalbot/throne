<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitLab authentication page.
     */
    public function redirectToProvider()
    {
        return Socialite::driver('gitlab')->scopes(['read_api'])->redirect();
    }

    /**
     * Obtain the user information from GitLab.
     */
    public function handleProviderCallback()
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

        return redirect('/dashboard');
    }
}
