<?php

namespace App\Providers;

use App\Http\Controllers\GoogleDriveController;
use App\Services\Google\GoogleService;
use Masbug\Flysystem\GoogleDriveAdapter;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Google;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Http;
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
        $client = (new GoogleService())?->client;

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

        // if (empty(Cache::get('upload_token'))) {
        //     \Log::info('Token not found');
        //     $authUrl = $client->createAuthUrl();
        //     $response = Http::get($authUrl);
        //     dd($response);
        //     return (new GoogleDriveController())->redirectLoginGoogle();
        // }

        \Log::debug($client->getAccessToken());

        $service = new \Google\Service\Drive($client);
        \Log::info('final fluxo');
        Storage::extend('google', function ($app, $config) use ($service) {
            $adapter = new GoogleDriveAdapter($service, '',     [
                'teamDriveId' => $config['folderId']
            ]);
            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}
