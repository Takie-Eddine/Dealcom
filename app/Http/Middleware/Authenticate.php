<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as FacadesRoute;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        //return $request->expectsJson() ? null : route('login');

        if (! $request->expectsJson()) {

            // if(Route::is(app()->getLocale().'coach/*')){
            //     return route('coach.login');
            // }

            if(FacadesRoute::is(app()->getLocale().'admin/*')){
                return route('admin.login');
            }

            else{
                return route('login');
            }


        }
    }
}
