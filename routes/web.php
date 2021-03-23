<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix(config('laravel-admin.route'))->middleware(['web', 'admin'])->group(function () {
    $firstModuleClassName = \Illuminate\Support\Arr::first(config('laravel-admin.modules'));
    $firstModuleClass = new $firstModuleClassName;
    Route::redirect('', config('laravel-admin.route') . '/' . $firstModuleClass->getRoute())->name('home');
    foreach(config('laravel-admin.modules') as $module) {
        $module = new $module;
        Route::get($module->getRoute(), $module->getAction());
    }
});

Route::get('/impersonate/leave', [\Lab404\Impersonate\Controllers\ImpersonateController::class, 'leave'])
    ->middleware('web')
    ->name('impersonate.leave');