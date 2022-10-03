<?php
namespace App\Services\Google;

use Google;
use Google\Client;
use Google\Service\Drive;

class GoogleService
{
    public Client $client;

    public function __construct(
        public string $appName = 'My perfect princess',
        public string $redirect_uri = 'http://localhost:8000',
        public string $scope = Drive::DRIVE
    ) {
        $this->client = new Client();
        $this->client->setApplicationName($this->appName);
        $this->client->setAuthConfig(base_path(env('GOOGLE_AUTH_CONFIG')));
        $this->client->setRedirectUri($this->redirect_uri);
        $this->client->addScope($this->scope);
    }
}
