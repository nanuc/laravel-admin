<?php

namespace Nanuc\LaravelAdmin\Modules;

use Illuminate\Support\Str;

abstract class AdminModule
{
    protected $caption;
    protected $action;
    protected $icon;

    public function getRoute()
    {
        return Str::kebab((new \ReflectionClass($this))->getShortName());
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getCaption()
    {
        return $this->caption;
    }
}