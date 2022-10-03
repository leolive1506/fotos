<?php

namespace App\Http\Middleware;

use App\Services\Google\GoogleService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TokenGoogleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty(Cache::get('upload_token'))) {
            \Log::warning('Google Token not found');
            $client = (new GoogleService())?->client;
            $authUrl = $client->createAuthUrl();

            return redirect()->away($authUrl);
        }

        return $next($request);
    }
}
