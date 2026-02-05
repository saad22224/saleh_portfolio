<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, ['en', 'ar'])) {
            App::setLocale($locale);
            URL::defaults(['locale' => $locale]);
        } else {
            // Default to Arabic as requested
            App::setLocale('en');
            URL::defaults(['locale' => 'en']);
        }

        return $next($request);
    }
}
