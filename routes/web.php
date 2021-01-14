<?php

use App\Http\Controllers\CompanyQFileController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProgramAreaController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\CoursePlanController;
use App\Http\Controllers\DocentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\QFileController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StageBedrijvenController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CompanyAccess;
use App\Http\Middleware\DocentAccess;
use App\Http\Middleware\StudentAccess;
use App\Http\Middleware\StudentAndDocentAccess;
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


        Route::resource('cv', CvController::class);
        Route::view('user/profile', 'profile.show')->name('profile');
        Route::resource('stageBedrijven/{stageBedrijven}/stage', StageController::class);
        Route::resource('dashboard', PagesController::class);
//              Route::post('test', [PagesController::class, 'redirectToDashboard'])->name('toStudent');
                Route::get('stage/{stage}/likes', [StageController::class, 'getLikes'])->name('likes');
        Route::get('reacties', [StageController::class, 'reactions'])->name('reacties');


        Route::middleware(StudentAndDocentAccess::class)->group(function () {
            /** voeg hier de routes toe waarbij alleen student en docent toegang hebben */

            Route::resource('stageBedrijven', StageBedrijvenController::class);
            Route::get('stageBedrijven/{stageBedrijven}/stage/{stage}/likes/undo', [StageController::class, 'undo'])->name('stage.likes.undo');
            Route::post('companyDashboard', [PagesController::class, 'redirectToCompanyDashboard'])->name('companyDash');
            Route::post('searchCompany', [DocentController::class, 'searchCompany'])->name('searchCompany');
            Route::get('user/{user}/courses/{course}/kwalificatieDossier', QFileController::class)->name('qfFileStudent');
            Route::get('stageList', [StageController::class, 'index'])->name('stageList');
        });


        Route::middleware(CompanyAccess::class)->group(function () {
            /** voeg hier de routes toe waarbij alleen bedrijven toegang hebben */
            Route::prefix('stageBedrijven/{stageBedrijven}')->group(function () {

//              Route::resource('stageBedrijven', StageBedrijvenController::class);
                Route::get('stage/{stage}/studentDashboard/{user}', [PagesController::class, 'companyLooksAtStudent'])->name('companyGoesToStudent');

                Route::get('stage/{stage}/studentDashboard/{user}/QFile', [PagesController::class, 'companyToStudentQFile'])->name('studentsQFile');
                Route::post('stage/{stage}/studentDashboard/{user}/course/{course}/kwalificatie', CompanyQFileController::class)->name('companyToStudentQFile');
                Route::get('stage/{stage}/studentDashboard/{user}/chooseCourse', [PagesController::class, 'companyChooseCourse'])->name('companyChooseCourse');
            });
        });


        Route::middleware(StudentAccess::class)->group(function () {
            /** voeg hier de routes toe waarbij alleen de student toegang heeft */
            Route::post('myQFile', [PagesController::class, 'toQFile'])->name('myQFile');
            Route::get('myQFile', [PagesController::class, 'toQFile'])->name('myQFile');

            Route::get('student/{user}/chooseCourse', [PagesController::class, 'chooseCourse'])->name('chooseCourseforQF');
        });


        Route::middleware(DocentAccess::class)->group(function () {
            /** voeg hier de routes toe waarbij alleen de docent toegang heeft */
            Route::resource('docent', DocentController::class);
            Route::post('docent/search', [DocentController::class, 'search'])->name('searchUser');
            Route::post('studentDashboard', [PagesController::class, 'redirectToDashboard'])->name('studentDash');
            Route::get('studentDashboard', [PagesController::class, 'redirectToDashboard'])->name('studentDash');
            Route::view('beheer', 'opleidingBeheer')->name('beheer');
            Route::resource('campus', CampusController::class);
            Route::resource('study', ProgramAreaController::class)->parameter('study', 'programArea');
            Route::resource('program', ProgramController::class)->except('show');
//            Route::prefix('program/{program}')->group(function () {
            Route::resource('program.semester', SemesterController::class)->except(['show', 'edit', 'update']);
//            });
            Route::resource('subject', SubjectController::class)->except('show');
            Route::resource('competence', CompetenceController::class);
            Route::resource('course', CourseController::class);
            Route::prefix('course/{course}')->group(function () {
                Route::resource('plan', CoursePlanController::class)
                    ->parameter('plan', 'coursePlan')->except(['show', 'edit', 'update']);
                Route::resource('enrollment', EnrollmentController::class);
                Route::prefix('plan/{coursePlan}')->group(function () {
                    Route::get('cijfers', [GradeController::class, 'index'])->name('subjectGrades');
                    Route::post('cijfer', [GradeController::class, 'store'])->name('cijfer.store');
                });
                Route::get('student/{student}/cijfers', [GradeController::class, 'index'])->name('studentGrades');
                Route::post('student/{student}/cijfers', [GradeController::class, 'update'])->name('studentGrades.update');
            });
            Route::get('plan/{plan}/student/{student}', [CoursePlanController::class,'show'])->name('coOpLocationForm');
            Route::post('plan/{plan}/student/{student}', [CoursePlanController::class,'update'])->name('coOpLocationSave');
            Route::get('student/{user}/course/{course}/kwalificatie', QFileController::class)->name('QDossier');
        });
        Route::post('docent/company', [StageBedrijvenController::class, 'search'])->name('SearchCompany');
    });
});
















//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
