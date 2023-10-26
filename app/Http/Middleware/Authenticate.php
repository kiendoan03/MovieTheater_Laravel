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
        // if (!auth()->guard('staff')->check() && !auth()->guard('customers')->check()) {
        //     if ($request->expectsJson()) {
        //         return null;
        //     } else {
        //         // Trả về trang đăng nhập cho guard 'customers' nếu không có user nào được xác thực
        //         return route('login.login');
        //     }
        // } else if (!auth()->guard('staff')->check()) {
        //     if ($request->expectsJson()) {
        //         return null;
        //     } else {
        //         // Trả về trang đăng nhập cho guard 'staff' nếu chỉ guard 'staff' chưa được xác thực
        //         return route('admin.staffs.login');
        //     }
        // } else if (!auth()->guard('customers')->check()) {
        //     if ($request->expectsJson()) {
        //         return null;
        //     } else {
        //         // Trả về trang đăng nhập cho guard 'customers' nếu chỉ guard 'customers' chưa được xác thực
        //         return route('login.login');
        //     }
        // }
        // if ($request->expectsJson()) {
        //     return null;
        // }
    
        // if (!auth()->guard('staff')->check()) {
        //     // Xử lý khi guard 'staff' chưa được xác thực
        //     return route('admin.staffs.login');
        // }
    
        // if (!auth()->guard('customers')->check()) {
        //     // Xử lý khi guard 'customers' chưa được xác thực
        //     return route('login.login');
        // }
    
        // // Xử lý khi cả hai guard đều đã được xác thực
    
        return null;
    }
}
