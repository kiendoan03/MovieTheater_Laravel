<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffAuthenticate
{
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('staff')->check()) {
            // Xử lý khi guard 'staff' chưa được xác thực
            return redirect()->route('admin.staffs.login');
        }

        return $next($request);
    }
}