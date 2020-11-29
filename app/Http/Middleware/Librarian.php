<?php

namespace App\Http\Middleware;

use Closure;

class Librarian
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
        if(auth()->user()->type !== 'librarian') {
            return redirect('/borrow/list');
        }
        return $next($request);
    }
}
