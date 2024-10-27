<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Periksa apakah user memiliki jabatan dan arahkan hanya jika perlu
        if ($user) {
            switch ($user->jabatan) {
                case 'Pelamar':
                    if (!$request->routeIs('dashboard')) {
                        return redirect()->route('dashboard');
                    }
                    break;
                case 'Admin':
                    if (!$request->routeIs('admin')) {
                        return redirect()->route('admin');
                    }
                    break;
                default:
                    if (!$request->routeIs('home')) {
                        return redirect()->route('home');
                    }
                    break;
            }
        }

        return $next($request);
    }
}
