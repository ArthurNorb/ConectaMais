<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\Fortify\LoginResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Livewire\Livewire::component('social-media-fields', \App\Http\Livewire\SocialMediaFields::class);
    }
}
