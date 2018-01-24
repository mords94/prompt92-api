<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;

class AutomaticMigration
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
        Artisan::call('migrate');
        Artisan::call('db:seed');

        return $next($request);
    }
}
