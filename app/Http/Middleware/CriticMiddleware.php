<?php

namespace App\Http\Middleware;

use App\Models\Critic;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Exception;


class CriticMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $filmId = $request->film_id;
        $userId = Auth::user()->id;
        $critics = Critic::all()->where('film_id', $filmId)->where('user_id', $userId);
        
        if($critics->count() > 0)
        {
            throw new Exception("Vous avez déjà critiqué ce film!", 403);
        }
        
        return $next($request);
    }
}
