<?php

use App\Http\Controllers\CalculateMax;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculateBarbell;
use App\Http\Controllers\Auth\AuthController;

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
    return view('welcome',
        [
            'active' => 'home'
        ]
    );
});

Route::get('/barbellCalculator', [CalculateBarbell::class, 'index'])
    ->name('barbellCalculator.index');

Route::resource('calculateMax', CalculateMax::class);



Route::prefix('login')->group(function() {
    Route::get('/', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/', [AuthController::class, 'login']);

    Route::get('/create', [AuthController::class, 'create'])
        ->name('auth.create');

    Route::post('/create', [AuthController::class, 'store'])
        ->name('auth.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
