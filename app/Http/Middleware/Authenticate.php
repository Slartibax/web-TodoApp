<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;

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
//        if(str_contains($request->url(),'/api/')){
//            return new JsonResponse([], 401);
//        }

        if (! $request->expectsJson()) {
            return route('login');
        }

        return new JsonResponse([],401);
    }
}
