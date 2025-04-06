<?php

namespace App\Http\Exceptions;

use Illuminate\Auth\AuthenticationException;

protected function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthenticated.'], 401);
    }

    $guard = data_get($exception->guards(), 0);
    
    switch ($guard) {
        case 'admin':
            return redirect()->guest(route('admin.login'));
        default:
            return redirect()->guest(route('login'));
    }
}