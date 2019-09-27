<?php

namespace App\Providers;

use App\Services\GithubService;
use Illuminate\Support\ServiceProvider;

class GithubServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(GithubService::class, function ($app) {
            return new GithubService();
        });
    }
}