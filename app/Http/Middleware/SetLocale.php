<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        if (auth()->check()) {
//            app()->setLocale(auth()->user()->lang);
//        } else {
//            $requestLanguage = $request->header('Accept-Language');
//            isset($requestLanguage) ? app()->setLocale($requestLanguage) : app()->setLocale(LanguageHelper::getDefaultLang());;
//        }
        return $next($request);
    }
}
