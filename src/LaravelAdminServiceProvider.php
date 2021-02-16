<?php

namespace Nanuc\LaravelAdmin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Nanuc\LaravelAdmin\Http\Livewire\Dashboard;
use Nanuc\LaravelAdmin\Http\Livewire\Users;
use Nanuc\LaravelAdmin\Http\Middleware\IsAdmin;

class LaravelAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-admin.php' => config_path('laravel-admin.php'),
        ], 'config');

        Blade::if('admin', function() {
            return auth()->check() && resolve(Admin::class)->isAdmin(auth()->user());
        });

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        app('router')->aliasMiddleware('admin', IsAdmin::class);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        Livewire::component('nanuc.laravel-admin.http.livewire.users', Users::class);
        Livewire::component('nanuc.laravel-admin.http.livewire.dashboard', Dashboard::class);

        config(['laravel-impersonate.leave_redirect_to' => 'admin/users']);
    }

    public function register()
    {
        $this->app->singleton(Admin::class, function($app){
            return new Admin();
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-admin.php', 'laravel-admin'
        );
    }
}