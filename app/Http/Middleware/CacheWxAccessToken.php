<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Wx\Base as ModelWx;

class CacheWxAccessToken
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
        ModelWx::saveAccessToken2Session();
        return $next($request);
    }
}
