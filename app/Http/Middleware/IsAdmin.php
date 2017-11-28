<?php

namespace LaravelShop\Http\Middleware;

use Closure;
use Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IsAdmin
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
        if (Auth::user() && Auth::user()->is_admin) {
            return $next($request);
        }

        throw new NotFoundHttpException('Not found');
//        return redirect('/');
    }
}
