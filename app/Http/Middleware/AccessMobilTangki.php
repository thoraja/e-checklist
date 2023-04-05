<?php

namespace App\Http\Middleware;

use App\Models\MobilTangki;
use Closure;
use Illuminate\Http\Request;

class AccessMobilTangki
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

    }
}
