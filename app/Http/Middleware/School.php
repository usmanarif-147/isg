<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class School
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (!Auth::check()) {
            return redirect()->route('school.login');
        }

        $userRole = Auth::user()->role;
        if ($userRole == 1) {
            return redirect()->route('admin.dashboard');
        }
        if ($userRole == 3) {
            return redirect()->route('student.dashboard');
        }

        if (!auth()->user()->status) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->back()->with(['message' => 'Your account is not activated']);
        }

        return $next($request);
    }
}
