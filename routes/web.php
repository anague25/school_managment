<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NiveauxController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\SettingsYearController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // nav-links
    Route::prefix('niveaux')->group(function(){

        Route::get('/',[NiveauxController::class,'index'])->name('niveaux.list');

    });

    Route::prefix('settings')->group(function(){

        Route::get('/',[SchoolYearController::class,'index'])->name('settings');

    });




});
