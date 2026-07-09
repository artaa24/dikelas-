<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $userRole = auth()->user()->role->name;

        // Check if user's role is in the allowed roles
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // If not authorized, redirect to their respective dashboard
        if ($userRole == 'super_admin') {
            return redirect('/admin/dashboard');
        } elseif ($userRole == 'teacher') {
            return redirect('/guru/dashboard');
        } else {
            return redirect('/dashboard');
        }
    }
}
