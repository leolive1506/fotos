<?php

namespace App\Services\Storage;

use Illuminate\Support\Facades\Storage;

class StorageService
{
    public static function delete($filename): bool
    {
        if (!empty($filename)) {
            Storage::disk('local')->delete($filename);
            return true;
        }

        return false;
    }
}
