<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // jika belum login -> ke halaman login (route bernama 'login')
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // jika login tetapi bukan admin -> redirect ke homepage atau abort
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access admin dashboard.');
            // atau: abort(403);
        }

        return $next($request);
    }
}

