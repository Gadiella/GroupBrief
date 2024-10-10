<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckGroupAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();
        $groupeId = $request->route('groupe'); // Récupérer l'ID du groupe depuis l'URL
    
        // Vérifier si l'utilisateur appartient au groupe
        if (!$user->groupes()->where('groupe_id', $groupeId)->exists()) {
            return response()->json(['message' => 'Accès refusé'], 403);
        }
    
        return $next($request);
    }
}
