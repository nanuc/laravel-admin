<?php

namespace Nanuc\LaravelAdmin\Modules\Users;

use Nanuc\LaravelAdmin\Modules\AdminModule;

class Users extends AdminModule
{
    protected $caption = 'Users';
    protected $action = \Nanuc\LaravelAdmin\Modules\Users\Livewire\Users::class;
    protected $icon = 'users';
}