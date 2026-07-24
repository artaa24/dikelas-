<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $user = auth()->user();

        // Admin selalu punya akses penuh
        if ($user->isAdmin()) {
            return $next($request);
        }

        if (!$user->hasPermission($permission)) {
            abort(403, 'Anda tidak memiliki hak akses untuk melakukan aksi ini.');
        }

        return $next($request);
    }
}
