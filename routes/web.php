<?php

use App\Http\Controllers\CampusController;
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
    Route::resource('campus',CampusController::class);
    Route::resource('program',ProgramController::class);

    Route::view('stageBedrijven','stageBedrijven');
    Route::resource('stageBedrijven',StageBedrijvenController::class);




    Route::group(['middleware' => Authenticate::class], function () {
        /** voeg hier de routes welke authorisatie nodig hebben */







    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
