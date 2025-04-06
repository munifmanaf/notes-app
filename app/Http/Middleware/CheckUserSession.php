<?php

// app/Http/Middleware/CheckUserSession.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user')) {
            return redirect('/login')->with('error', 'Please login to continue');
        }
        
        return $next($request);
    }
}
