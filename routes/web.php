<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\AttributionController;
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

Route::get('/test', function () {
    return view('test');
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

        Route::get('/',[LevelsController::class,'index'])->name('niveaux.list');

    });

    Route::prefix('settings')->group(function(){

        Route::get('/',[SchoolYearController::class,'index'])->name('settings');
        Route::get('/create-school-year',[SchoolYearController::class,'create'])->name('settings.create_school_year');
        Route::get('/create-level',[LevelsController::class,'create'])->name('settings.create_levels');
        Route::get('/edit-level/{level}',[LevelsController::class,'edit'])->name('settings.edit_levels');

    });


    Route::prefix('classes')->group(function(){
        Route::get('/',[ClassController::class,'index'])->name('classes');
        Route::get('/create',[ClassController::class,'create'])->name('classes.create');
        Route::get('/edit/{class}',[ClassController::class,'edit'])->name('classes.edit');
    });
    

    // Route  pour interagir avec les eleves

    Route::prefix('students')->group(function(){
        Route::get('/',[StudentController::class,'index'])->name('students');
        Route::get('/create',[StudentController::class,'create'])->name('students.create');
        Route::get('/{student}',[StudentController::class,'show'])->name('students.show');
        Route::get('/edit/{student}',[StudentController::class,'edit'])->name('students.edit');
    });
   
    Route::prefix('inscription')->group(function(){
        Route::get('/',[AttributionController::class,'index'])->name('inscription');
        Route::get('/create',[AttributionController::class,'create'])->name('inscription.create');
        Route::get('/edit/{attribution}',[AttributionController::class,'edit'])->name('inscription.edit');
      
    });

    Route::prefix('payments')->group(function(){
        Route::get('/',[PaymentController::class,'index'])->name('payments');
        Route::get('/create',[PaymentController::class,'create'])->name('payments.create');
        Route::get('/edit/{payment}',[PaymentController::class,'edit'])->name('payments.edit');
       
      
    });




});
