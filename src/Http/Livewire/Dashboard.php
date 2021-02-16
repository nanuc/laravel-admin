<?php

namespace Nanuc\LaravelAdmin\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $title = 'Dashboard';

    public function render()
    {
        return view('admin::dashboard')->layout('admin::layout', ['title' => $this->title]);
    }
}
