<?php

namespace Nanuc\LaravelAdmin\Modules\Users\Livewire;

use Nanuc\LaravelAdmin\Modules\ModuleComponent;

class Users extends ModuleComponent
{
    protected $title = 'Users';
    protected $view = 'admin::users';

    public $search = '';

    protected function getRenderParameters()
    {
        return [
            'users' => $this->getUsers()
        ];
    }

    protected function getUsers()
    {
        $userModel = config('laravel-admin.user-model');
        $users = $userModel::query()->take(10);

        if(strlen($this->search) > 0) {
            $users->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%');
        }
        $users->orderBy('name');

        return $users->get();
    }

    public function impersonate($user)
    {
        auth()->user()->impersonate(config('laravel-admin.user-model')::find($user));
        return redirect('/dashboard');
    }
}
