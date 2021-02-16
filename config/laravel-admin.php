<?php

return [
    'admins' => explode(',', env('ADMINS', '')),
    'logo' => '/images/logo.png',
    'user-model' => \App\Models\User::class,
    'modules' => [
        [
            'caption' => 'Dashboard',
            'route' => 'dashboard',
            'action' => \Nanuc\LaravelAdmin\Http\Livewire\Dashboard::class,
            'icon' => 'home'
        ],
        [
            'caption' => 'Users',
            'route' => 'users',
            'action' => \Nanuc\LaravelAdmin\Http\Livewire\Users::class,
            'icon' => 'users'
        ],

    ]
];
