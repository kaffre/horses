<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class Cache
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
        $key = $this->makeCacheKey($request->fullUrl());

        if (\Cache::has($key)) {
            return response(\Cache::get($key));
        }

        return $next($request);
    }

    public function terminate($request, Response $response)
    {
        $key = $this->makeCacheKey($request->fullUrl());
        if (!\Cache::has($key)) {
            \Cache::put($key,$response->getContent(),1440);
        }
    }
 
    protected function makeCacheKey($url)
    {
        return 'route_'.Str::slug($url);
    }
}
