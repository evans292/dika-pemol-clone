<?php

use App\Http\Controllers\Sales\ActivityController;
use App\Http\Controllers\Sales\DataController;
use App\Http\Controllers\Sales\PresenceController;
use App\Models\Data;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function() {
    Route::resource('data', DataController::class)->except([
        'showIdCard', 'showAllResult'
    ]);

    Route::get('id-card', [DataController::class, 'showIdCard'])->name('data.id-card');
    Route::get('result', [DataController::class, 'showAllResult'])->name('data.result');

    Route::resource('presence', PresenceController::class);
    Route::resource('activity', ActivityController::class);
});
