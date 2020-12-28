<?php

namespace App\Http\Middleware;

use App\Models\SystemDomain;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        $guard = current($guards);
        $request->attributes->add(['guard' => $guard]);
        if ($this->auth->guard($guard)->check()) {
            return $this->auth->shouldUse($guard);
        }
        $this->unauthenticated($request, $guards);
    }
}
