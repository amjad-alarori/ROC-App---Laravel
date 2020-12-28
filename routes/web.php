<?php

use App\Http\Controllers\CampusController;
use App\Http\Controllers\ProgramAreaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StageBedrijvenController;
use App\Http\Middleware\Authenticate;
use App\Models\StageBedrijven;
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

Route::group(['middleware' => 'web'], function () {
    /** voeg hier de routes welke zonder authorisatie te bereiken is */

    Route::view('','welcome');
    Route::view('studentDashboard','studentDashboard');



    Route::resource('program',ProgramController::class);
    Route::resource('campus',CampusController::class);
    Route::resource('course',CourseController::class);
    Route::prefix('course/{course}')->group(function (){



    });




    Route::view('stageBedrijven','stageBedrijven');
    Route::resource('stageBedrijven',StageBedrijvenController::class);

        Route::resource('opleiding', ProgramAreaController::class);
//        Route::prefix('locatie/{id}')->group(function (){
//            Route::resource('opleiding', 'ProgramAreaController');
//            Route::prefix('opleiding/{id}')->group(function (){
//                Route::resource('richting', 'ProgramController');
//            });
//        });



    Route::group(['middleware' => Authenticate::class], function () {
        /** voeg hier de routes welke authorisatie nodig hebben */







    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
