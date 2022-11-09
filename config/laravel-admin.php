<?php

return [
    'admins' => explode(',', env('ADMINS', '')),
    'logo' => '/images/logo.png',
    'user-model' => \App\Models\User::class,
    'modules' => [
        \Nanuc\LaravelAdmin\Modules\Users\Users::class,
    ],
    'route' => 'admin',
    'back-to-app-route' => 'dashboard',
    'layout' => 'admin::layout',
    'styles' => [

    ],
    'scripts' => [

    ],
];
