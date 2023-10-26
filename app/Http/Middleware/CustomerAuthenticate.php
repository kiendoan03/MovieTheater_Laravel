<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('customers')->check()) {
            // Xử lý khi guard 'customers' chưa được xác thực
            return redirect()->route('login.login');
        }

        return $next($request);
    }
}