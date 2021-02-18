<?php

namespace Nanuc\LaravelAdmin\Modules;

abstract class AdminModule
{
    protected $caption;
    protected $route;
    protected $action;
    protected $icon;

    public function getRoute()
    {
        return $this->route;
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