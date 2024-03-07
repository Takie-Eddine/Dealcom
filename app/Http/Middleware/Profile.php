<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Profile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user->profile()->first()) {
            toastr()->error('Please Complete Your Information!', 'Sorry', ['timeOut' => 10000]);
            return redirect()->route('profile.edit',$user->id);
        }
        return $next($request);
    }
}
