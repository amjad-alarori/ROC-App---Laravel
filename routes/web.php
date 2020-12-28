<?php

use App\Http\Controllers\CampusController;
use App\Http\Controllers\ProgramAreaController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\StageBedrijvenController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\Authenticate;
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


    Route::view('', 'home');


    Route::view('studentDashboard','studentDashboard');


    Route::resource('program',ProgramController::class);
    Route::resource('campus',CampusController::class);
    Route::resource('course',CourseController::class);
    Route::prefix('course/{course}')->group(function (){



    });

    Route::resource('campus',CampusController::class);
    Route::resource('program',ProgramController::class);
    Route::resource('subject',SubjectController::class);
    Route::resource('competence',CompetenceController::class);
    Route::resource('course',CourseController::class);
    Route::prefix('course/{course}')->group(function (){


        Route::resource('opleiding', ProgramAreaController::class);
//        Route::prefix('locatie/{id}')->group(function (){
//            Route::resource('opleiding', 'ProgramAreaController');
//            Route::prefix('opleiding/{id}')->group(function (){
//                Route::resource('richting', 'ProgramController');
//            });
//        });

    });







    Route::resource('stageBedrijven',StageBedrijvenController::class);
    Route::prefix('stageBedrijven/{stageBedrijven}')->group(function () {
        Route::resource('stage', StageController::class);
    });








    Route::group(['middleware' => Authenticate::class], function () {
        /** voeg hier de routes welke authorisatie nodig hebben */
        Route::get('dashboard', [PagesController::class, 'index'])->name('dashboard');
        Route::resource('cv', CVController::class);

    });
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
