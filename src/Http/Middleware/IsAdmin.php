<?php

namespace Nanuc\LaravelAdmin\Http\Middleware;

use Nanuc\LaravelAdmin\Admin;

class IsAdmin
{
    public function handle($request, $next, $guard = null)
    {
        if(resolve(Admin::class)->isAdmin(auth()->user())) {
            return $next($request);
        }

        abort(404);
    }
}
