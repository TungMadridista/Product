<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role > 0) {
                return $next($request);
            } else {
                return redirect('admin/login')->with('error','You do not have permission to access this page!');
            }
        }
        else
        {
            return redirect('admin/login')->with('error','Login to the admin page!');
        }
    }
}
