<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\BookController;


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

Route::get('/passport', function () {
    return view('vendor.passport.authorize');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::get('/oauth2/redirect', [WebhookController::class, 'callback']);


require __DIR__.'/auth.php';
