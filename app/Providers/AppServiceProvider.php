<?php

namespace App\Providers;

use App\Contracts\ProfileInterface;
use App\Executors\Admin\Profile as AdminProfile;
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
        $this->app->bind(ProfileInterface::class, AdminProfile::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
