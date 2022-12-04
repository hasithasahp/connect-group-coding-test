<?php

namespace App\Providers;

use App\Services\GroupByOwnersService;
use Illuminate\Support\ServiceProvider;

class GroupByOwnerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GroupByOwnersService::class, function($app) {
            return new GroupByOwnersService();
        });
    }
}
