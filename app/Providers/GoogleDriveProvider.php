<?php

namespace App\Providers;

use Masbug\Flysystem\GoogleDriveAdapter;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Google;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class GoogleDriveProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $client = new \Google\Client();
        $client->setApplicationName('My perfect princess');
        $client->setAuthConfig(base_path(env('GOOGLE_AUTH_CONFIG')));
        $redirect_uri = 'http://localhost:8000';
        $client->setRedirectUri($redirect_uri);
        $client->addScope(Google\Service\Drive::DRIVE);

        $tokenExists = !empty(Cache::get('upload_token'));
        if ($tokenExists) {
            \Log::info('Token already exists');
            $client->setAccessToken(Cache::get('upload_token'));
            if ($client->isAccessTokenExpired()) {
                \Log::info('Token expired');
                Cache::forget('upload_token');
            }
        }

        if (!is_null(request('code')) && !$tokenExists) {
            \Log::info('Creat token');
            $token = $client->fetchAccessTokenWithAuthCode(request('code'));
            $client->setAccessToken($token);

            // store in the session also
            if (is_array($token) && array_key_exists('expires_in', $token)) {
                \Log::info('Token is valid');
                Cache::put('upload_token', $token, $token['expires_in']);
            }
        }

        if (empty(Cache::get('upload_token'))) {
            \Log::info('Token not found');
            // dd('oi t', Cache::get('upload_token'));
            $url = $client->createAuthUrl();
            \Log::info('auth_url ' . $url);
            return Redirect::to($url);
        }

        \Log::debug($client->getAccessToken());

        $service = new \Google\Service\Drive($client);
        \Log::info('final fluxo');
        Storage::extend('google', function ($app, $config) use ($service) {
            $adapter = new GoogleDriveAdapter($service, $config['folderId']);
            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}
