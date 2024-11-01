<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $locale = Auth::user()->language == 0 ? 'en' : 'es';
            app()->setLocale($locale);
        } elseif (session()->has('locale')) {
            app()->setLocale(session('locale') == 0 ? 'en' : 'es');
        }

        return $next($request);
    }
}
