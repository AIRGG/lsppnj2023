<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekLoginUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Auth::guard('user'));
        // dd(auth()->guard('user')->check());
        if (!auth()->guard('user')->check()) return redirect()->route('landing.index')->with('error', 'Silahkan Login Dahulu...');

        $user = auth()->guard('user')->user();
        // if ($user == null) {
        //     return redirect()->route('landing.index')->with('error', 'Silahkan Login Dahulu...');
        // }
        $level = $user->level;
        $allowed_roles = array_slice(func_get_args(), '2');
        if (in_array($level, $allowed_roles)) {
            return $next($request);
        }

        return abort(403);
    }
}
