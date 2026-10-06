<?php

namespace App\Http\Middleware;

use Closure;
use App;

class LanguageManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = session()->get('locale');

        if (!in_array($locale, config('app.supported_locales'), true)) {
            $locale = config('app.locale');
            session()->put('locale', $locale);
        }

        App::setLocale($locale);

        return $next($request);
    }
}
