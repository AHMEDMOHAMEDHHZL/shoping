<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // التحقق من ما إذا كان المستخدم معتمدًا كـ "admin" أو "user"
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->status === 'admin') {
                // إذا كان المستخدم معتمدًا كـ "admin"، قم بتوجيهه إلى صفحة الداشبورد
                return redirect()->route('dashboard');
            } elseif ($user->status === 'user') {
                // إذا كان المستخدم معتمدًا كـ "user"، قم بتوجيهه إلى صفحة "home"
                return redirect()->route('home');
            }
        }

        // إذا لم يتم العثور على حالة للمستخدم، قم بتسجيل الخروج
        Auth::logout();

        // وبعد ذلك، قم بتوجيه المستخدم إلى صفحة تسجيل الدخول
        return redirect()->route('/login');
    }
}
