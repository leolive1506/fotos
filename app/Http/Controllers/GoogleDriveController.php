<?php

namespace App\Http\Controllers;

use Exception;
use Google\Client;
use Google\Service\Drive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Google;

class GoogleDriveController extends Controller
{
    public function create()
    {
        $client = new \Google\Client();
        $client->setAuthConfig(base_path(env('GOOGLE_AUTH_CONFIG')));
        $redirect_uri = 'http://localhost:8000';
        $client->setRedirectUri($redirect_uri);
        $client->addScope(Google\Service\Drive::DRIVE);

        $authUrl = $client->createAuthUrl();
        return view('pages.google.drive.create', compact('authUrl'));
    }

    public function store(Request $request)
    {
        dd($request->file('photo')->store('', "google"));
        dd($request->all());
    }
}
