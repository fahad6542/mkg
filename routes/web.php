<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\General\UnitsController;
use App\Http\Controllers\General\AuthorsController;
use App\Http\Controllers\General\SeriesController;
use App\Http\Controllers\General\PublishersController;
use App\Http\Controllers\General\TopicsController;
use App\Http\Controllers\General\ClassesController;
use App\Http\Controllers\General\LanguagesController;
use App\Http\Controllers\General\CreditCardController;
use App\Http\Controlleemrs\General\LocationsController;
use App\Http\Controllers\General\DenominationController;
use App\Http\Controllers\General\SchoolsController;

use App\Http\Controllers\HR\EmployeeController;
use App\Http\Controllers\HR\AttendanceController;
use App\Http\Controllers\HR\LeaveController;
use App\Http\Controllers\HR\HolidayController;
use App\Http\Controllers\HR\ReportController;
use App\Http\Controllers\HR\AttendanceSheetController;

use App\Http\Controllers\General\ProductTypeController;
use App\Http\Controllers\General\CategoriesController;
use App\Http\Controllers\General\SubCategoriesController;
use App\Http\Controllers\General\Products\BooksController;
use App\Http\Controllers\General\Products\NoteBooksController;
use App\Http\Controllers\General\Products\UniformController;
use App\Http\Controllers\General\Products\StationariesController;
use App\Http\Controllers\General\Products\GiftAndToyesController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;

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
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('units', UnitsController::class);
    Route::resource('authors', AuthorsController::class);
    Route::resource('series', SeriesController::class);
    Route::resource('publisher', PublishersController::class);
    Route::resource('topics', TopicsController::class);
    Route::resource('classes', ClassesController::class);
    Route::resource('languages', LanguagesController::class);
    Route::resource('credit', CreditCardController::class);
    Route::resource('locations', LocationsController::class);
    Route::resource('denomination', DenominationController::class);


    Route::resource('schools', SchoolsController::class);

   

    // HR Modules

    Route::resource('employee', EmployeeController::class);
    Route::resource('attendance',AttendanceController::class);
    Route::resource('leave',LeaveController::class);
    Route::resource('holiday',HolidayController::class);
    Route::resource('report',ReportController::class);
    Route::get('Attendance/Sheet', [AttendanceSheetController::class, 'index'])->name('Attendance/Sheet');
    Route::post('Attendance/Show', [AttendanceSheetController::class, 'show'])->name('show');

    Route::resource('general-info', ProductTypeController::class);
    Route::resource('category', CategoriesController::class);
    Route::resource('subcategory', SubCategoriesController::class);
    Route::resource('subcategory', SubCategoriesController::class);
    Route::post('/fetch-category',[SubCategoriesController::class,'fetchCategory']);
    Route::post('/fetch-subcategory',[BooksController::class,'fetchCategory']);
    Route::resource('books', BooksController::class);
    Route::resource('note-books', NoteBooksController::class);
    Route::post('/fetch-subcategories',[NoteBooksController::class,'fetchCategory']);

    Route::resource('uniform', UniformController::class);
    Route::resource('stationary', StationariesController::class);
    Route::resource('gift-toys', GiftAndToyesController::class);


    


});

// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('sadmin')->as('sadmin.')->group(
    function () {
    }
);

Route::prefix('company')->as('company.')->group(
    function () {
    }
);

Route::prefix('branch')->as('branch.')->group(
    function () {
    }
);

Route::prefix('customer')->as('customer.')->group(
    function () {
    }
);
