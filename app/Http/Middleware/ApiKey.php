<?php

namespace App\Http\Middleware;

use Closure;

class ApiKey
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
        if($request->apikey !== env('API_KEY', '')) {
            abort(403, "Valor da chave API inválido.");
        }

        return $next($request);
    }
}
