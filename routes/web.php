<?php

use App\Http\Controllers\CampusController;
use App\Http\Controllers\CoursePlanController;
use App\Http\Controllers\DocentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StageBedrijvenController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CompanyAccess;
use App\Http\Middleware\DocentAccess;
use App\Http\Middleware\StudentAccess;
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

    Route::group(['middleware' => Authenticate::class], function () {
        /** voeg hier de routes welke authorisatie nodig hebben */

        Route::resource('dashboard', PagesController::class);
        Route::resource('stageBedrijven', StageBedrijvenController::class);



        Route::middleware(CompanyAccess::class)->group(function () {
//            Route::resource('stageBedrijven', StageBedrijvenController::class);
            Route::prefix('stageBedrijven/{stageBedrijven}')->group(function () {
                Route::get('stage/{stage}/likes', [StageController::class, 'getLikes'])->name('likes');
                Route::get('stage/{stage}/likes/undo', [StageController::class, 'undo'])->name('stage.likes.undo');
                Route::resource('stage', StageController::class);
                Route::post('test', [PagesController::class, 'redirectToDashboard'])->name('toStudent');
            });
        });


        Route::middleware(StudentAccess::class)->group(function () {
            Route::resource('cv', CvController::class);
            Route::view('user/profile', 'profile.show')->name('profile');
        });


        Route::middleware(DocentAccess::class)->group(function () {
            /** voeg hier de routes welke alleen een user met role 2 (docent) mag daar heen */
            Route::resource('docent', DocentController::class);
            Route::post('docent/search', [DocentController::class, 'search'])->name('searchUser');
            Route::post('studentDashboard', [PagesController::class, 'redirectToDashboard'])->name('DashGo');
            Route::view('beheer', 'opleidingBeheer')->name('beheer');
            Route::resource('campus', CampusController::class);
            Route::resource('program', ProgramController::class);
            Route::prefix('program/{program}')->group(function () {
                Route::resource('semester', SemesterController::class);
            });
            Route::resource('subject', SubjectController::class);
            Route::resource('competence', CompetenceController::class);
            Route::resource('course', CourseController::class);
            Route::prefix('course/{course}')->group(function () {

                Route::resource('plan',CoursePlanController::class)->parameter('plan','coursePlan');

            });
        });
    });
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
