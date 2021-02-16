<?php

namespace Nanuc\LaravelAdmin;

class Admin
{
    public function isAdmin($user)
    {
        return in_array($user?->email, config('laravel-admin.admins'));
    }
}