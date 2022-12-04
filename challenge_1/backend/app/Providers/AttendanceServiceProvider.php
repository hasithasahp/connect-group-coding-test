<?php

namespace App\Providers;

use App\Services\AttendanceService;
use Illuminate\Support\ServiceProvider;

class AttendanceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AttendanceService::class, function($app) {
            return new AttendanceService();
        });
    }
}
