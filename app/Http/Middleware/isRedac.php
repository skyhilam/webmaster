<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\Statut;

class isRedac
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
        $statut = Statut::getStatut();
        if ($statut == 'admin' || $statut == 'redac' || $statut == 'super') {
            return $next($request);
        }
        
        return redirect('/');
    }
}
