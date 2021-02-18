<?php

namespace Nanuc\LaravelAdmin\Modules\Users\Livewire;

use Livewire\Component;

class Users extends Component
{
    public $title = 'Users';

    public $search = '';

    public function render()
    {
        return view('admin::users', ['users' => $this->getUsers()])
            ->layout('admin::layout', ['title' => $this->title]);
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
