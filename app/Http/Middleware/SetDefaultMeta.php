<?php

namespace App\Http\Middleware;

use Closure;

class SetDefaultMeta
{
    public function handle($request, Closure $next): mixed
    {
        view()->share('meta', [
            'og:title' => config('app.name'),
            'og:description' => 'Our mission is to enhance quality of life for individuals with neuro-diversity and special needs by offering innovative products, services, and a supportive community through an inclusive marketplace.',
            'og:image' => asset('frontend/images/logo_diverrx.png'),
            'og:url' => url()->current(),
            'og:type' => 'website',
        ]);

        return $next($request);
    }
}
