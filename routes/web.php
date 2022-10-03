<?php

use App\Http\Controllers\GoogleDriveController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UserController::class);
    Route::group(['prefix' => 'drive', 'middleware' => 'token.google'], function () {
        Route::get('/login', [GoogleDriveController::class, 'redirectLoginGoogle'])->name('drive.redirect');
        Route::get('create', [GoogleDriveController::class, 'create'])->name('drive.create');
        Route::post('/', [GoogleDriveController::class, 'store'])->name('drive.store');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
