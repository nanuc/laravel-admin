<?php

namespace Nanuc\LaravelAdmin\Modules;

use Illuminate\Support\Str;
use Nanuc\LaravelAdmin\Exceptions\LaravelAdminException;

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
        if(!$this->icon) {
            throw new LaravelAdminException("No icon defined for module " . self::class);
        }

        return $this->icon;
    }

    public function getCaption()
    {
        return $this->caption;
    }
}