<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->middleware(['web', 'admin'])->group(function () {
    Route::redirect('', 'admin/' . \Illuminate\Support\Arr::first(config('laravel-admin.modules'))['route'])->name('home');
    foreach(config('laravel-admin.modules') as $module) {
        Route::get($module['route'], $module['action']);
    }
});

Route::get('/impersonate/leave', [\Lab404\Impersonate\Controllers\ImpersonateController::class, 'leave'])
    ->middleware('web')
    ->name('impersonate.leave');