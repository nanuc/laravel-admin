<?php

namespace Nanuc\LaravelAdmin\Modules;

use Livewire\Component;

abstract class ModuleComponent extends Component
{
    protected $title;
    protected $view;

    public function render()
    {
        return view($this->getView(), $this->getRenderParameters())
            ->layout(config('laravel-admin.layout'), ['title' => $this->title]);
    }

    protected function getView()
    {
        return $this->view;
    }

    protected function getRenderParameters()
    {
        return [];
    }
}
