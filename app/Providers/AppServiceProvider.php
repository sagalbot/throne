<?php

namespace App\Providers;

use Gitlab\Client;
use Gitlab\ResultPager;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        ResourceCollection::withoutWrapping();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Client::class, function () {
            $client = Client::create('https://gitlab.com');

            if ($user = auth()->user()) {
                $client->authenticate($user->token, Client::AUTH_OAUTH_TOKEN);
            }

            return $client;
        });

        $this->app->bind(ResultPager::class, function () {
            return new ResultPager(resolve(Client::class));
        });
    }
}
