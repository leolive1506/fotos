<?php

namespace App\Http\Controllers;

use App\Jobs\Google\StoreFileDriveJob;
use App\Services\Google\GoogleService;
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
        return view('pages.google.drive.create');
    }

    public function store(Request $request)
    {
        dispatch(new StoreFileDriveJob('photo'));
        return redirect()->back()->with('success', 'Na fila  para upload');
    }
}
