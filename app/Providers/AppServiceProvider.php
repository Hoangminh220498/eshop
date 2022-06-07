<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
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
        $this->app->singleton(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\Repositories\CategoryRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ProductRepositoryInterface::class,
            \App\Repositories\ProductRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Schema::defaultStringLength(191);
    }
}
