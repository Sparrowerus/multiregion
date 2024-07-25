<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\City;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class SetCity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $citySlug = $request->route('city');

        if ($citySlug && City::where('slug', $citySlug)->exists()) {
            $city = City::where('slug', $citySlug)->firstOrFail();
            Session::put('city', $city->slug);
            $request->attributes->set('currentCity', $city);
        } else {
            $citySlug = Session::get('city');
            if ($citySlug) {
                $city = City::where('slug', $citySlug)->first();
                if ($city) {
                    $request->attributes->set('currentCity', $city);
                    if ($request->route('city') &&  $request->is('about') || $request->is('news')) {
                        return redirect("/$citySlug" . $request->getRequestUri());
                    }
                }
            }
        }

        return $next($request);
    }
}
