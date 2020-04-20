<?php

namespace App\Http\Controllers;

use Gitlab\Client;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var \Gitlab\Client
     */
    private $client;

    public function __construct(Client $gitlab)
    {
        $this->client = $gitlab;
    }

    public function __invoke()
    {
        $client = Client::create('https://gitlab.com');

        if( $user = auth()->user() ) {
            $client->authenticate($user->token, Client::AUTH_OAUTH_TOKEN);
        }
    }
}
