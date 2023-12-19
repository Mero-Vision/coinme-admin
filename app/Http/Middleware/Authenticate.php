<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        sweetalert()->addWarning('Please log in before attempting to access the system. Ensure you have valid credentials.');
        return $request->expectsJson() ? null : route('login');
    }
}