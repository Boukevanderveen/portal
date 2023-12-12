<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ElectiveController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectWeekController;

use Illuminate\Support\Facades\Route;

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


//Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
	return view("index");
    })->name('index');

    Route::get('/login', function () {
	return view("auth.login");
    })->name('login');


    Route::group([ 'prefix' => 'websites', 'as' => 'websites.'], function ()
    {
        Route::get('personal', [WebsiteController::class, 'indexPersonal'])->name('personal');

        Route::get('', [WebsiteController::class, 'index'])->name('index');
        Route::get('create', [WebsiteController::class, 'create'])->name('create');
        Route::post('store', [WebsiteController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{website}'], function ()
        {
            Route::delete('destroy', [WebsiteController::class, 'destroy'])->name('destroy');
            Route::get('edit', [WebsiteController::class, 'edit'])->name('edit');
            Route::post('update', [WebsiteController::class, 'update'])->name('update');
        });
    });

    Route::group([ 'prefix' => 'projects', 'as' => 'projects.'], function ()
    {
        Route::get('', [ProjectController::class, 'index'])->name('index');
    });

    Route::group([ 'prefix' => 'tests', 'as' => 'tests.'], function ()
    {
        Route::get('', [TestController::class, 'index'])->name('index');
        Route::get('lastyear', [TestController::class, 'indexLastYear'])->name('lastyear');

        Route::group([ 'prefix' => '{test}'], function ()
        {
            Route::get('show', [TestController::class, 'show'])->name('show');
            Route::group([ 'prefix' => 'registrations', 'as' => 'registrations.'], function ()
            {
                Route::post('store', [TestController::class, 'registrationsStore'])->name('store');
                Route::delete('destroy', [TestController::class, 'registrationsDestroy'])->name('destroy');
            });
        });
    });

    Route::group([ 'prefix' => 'projectweeks', 'as' => 'projectweeks.'], function ()
    {
        Route::get('', [ProjectWeekController::class, 'index'])->name('index');
        Route::get('lastyear', [ProjectWeekController::class, 'indexLastYear'])->name('lastyear');

        Route::group([ 'prefix' => '{projectweek}'], function ()
        {
            Route::get('show', [ProjectWeekController::class, 'show'])->name('show');
            Route::group([ 'prefix' => 'registrations', 'as' => 'registrations.'], function ()
            {
                Route::post('store', [ProjectWeekController::class, 'registrationsStore'])->name('store');
                Route::delete('destroy', [ProjectWeekController::class, 'registrationsDestroy'])->name('destroy');
            });
        });
    });

    Route::group([ 'prefix' => 'trips', 'as' => 'trips.'], function ()
    {
        Route::get('', [TripController::class, 'index'])->name('index');

        Route::group([ 'prefix' => '{trip}'], function ()
        {
            Route::delete('destroy', [TripController::class, 'destroy'])->name('destroy');
        });

        Route::get('search', [TripController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'electives', 'as' => 'electives.'], function ()
    {
        Route::get('', [ElectiveController::class, 'index'])->name('index');

        Route::group([ 'prefix' => '{elective}'], function ()
        {
            Route::get('show', [ElectiveController::class, 'show'])->name('show');
        });

        Route::get('search', [ElectiveController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'books', 'as' => 'books.'], function ()
    {
        Route::get('', [BookController::class, 'index'])->name('index');

        Route::group([ 'prefix' => '{book}'], function ()
        {
            Route::get('show', [BookController::class, 'show'])->name('show');
        });

        Route::get('search', [BookController::class, 'searchIndex'])->name('search');
    });

Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middlware' => ['auth'] ],function ()
{
    Route::get('', [HomeController::class, 'adminIndex'])->name('index');
    
    Route::group([ 'prefix' => 'users', 'as' => 'users.'], function ()
    {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{user}'], function ()
        {
            Route::delete('destroy', [UserController::class, 'destroy'])->name('destroy');
            Route::get('edit', [UserController::class, 'edit'])->name('edit');
            Route::post('update', [UserController::class, 'update'])->name('update');
        });

        Route::get('search', [UserController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'projects', 'as' => 'projects.'], function ()
    {
        Route::get('', [ProjectController::class, 'adminIndex'])->name('index');
        Route::get('create', [ProjectController::class, 'create'])->name('create');
        Route::post('store', [ProjectController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{project}'], function ()
        {
            Route::delete('destroy', [ProjectController::class, 'destroy'])->name('destroy');
            Route::get('edit', [ProjectController::class, 'edit'])->name('edit');
            Route::post('update', [ProjectController::class, 'update'])->name('update');
        });
    });

    Route::group([ 'prefix' => 'websites', 'as' => 'websites.'], function ()
    {
        Route::get('', [WebsiteController::class, 'adminIndex'])->name('index');
        Route::get('create', [WebsiteController::class, 'adminCreate'])->name('create');
        Route::post('store', [WebsiteController::class, 'adminStore'])->name('store');

        Route::group([ 'prefix' => '{website}'], function ()
        {
            Route::delete('destroy', [WebsiteController::class, 'adminDestroy'])->name('destroy');
            Route::get('edit', [WebsiteController::class, 'adminEdit'])->name('edit');
            Route::post('update', [WebsiteController::class, 'adminUpdate'])->name('update');
        });

        Route::get('search', [WebsiteController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'tests', 'as' => 'tests.'], function ()
    {
        Route::get('', [TestController::class, 'adminIndex'])->name('index');
        Route::get('create', [TestController::class, 'create'])->name('create');
        Route::post('store', [TestController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{test}'], function ()
        {
            Route::delete('destroy', [TestController::class, 'destroy'])->name('destroy');
            Route::get('edit', [TestController::class, 'edit'])->name('edit');
            Route::post('update', [TestController::class, 'update'])->name('update');

            Route::group([ 'prefix' => 'registrations', 'as' => 'registrations.'], function ()
            {
                Route::get('', [TestController::class, 'registrationsIndex'])->name('index');
                Route::post('store', [TestController::class, 'adminRegistrationsStore'])->name('store');
                Route::group([ 'prefix' => '{registration}'], function (){
                Route::delete('destroy', [TestController::class, 'adminRegistrationsDestroy'])->name('destroy');
                });
            });
        });

        Route::get('search', [TestController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'projectweeks', 'as' => 'projectweeks.'], function ()
    {
        Route::get('', [ProjectWeekController::class, 'adminIndex'])->name('index');
        Route::get('create', [ProjectWeekController::class, 'create'])->name('create');
        Route::post('store', [ProjectWeekController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{projectweek}'], function ()
        {
            Route::delete('destroy', [ProjectWeekController::class, 'destroy'])->name('destroy');
            Route::get('edit', [ProjectWeekController::class, 'edit'])->name('edit');
            Route::post('update', [ProjectWeekController::class, 'update'])->name('update');

            Route::group([ 'prefix' => 'registrations', 'as' => 'registrations.'], function ()
            {
                Route::get('', [ProjectWeekController::class, 'registrationsIndex'])->name('index');
                Route::post('store', [ProjectWeekController::class, 'adminRegistrationsStore'])->name('store');
                Route::group([ 'prefix' => '{registration}'], function (){
                Route::delete('destroy', [ProjectWeekController::class, 'adminRegistrationsDestroy'])->name('destroy');
                });
            });
        });

        Route::get('search', [ProjectWeekController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'trips', 'as' => 'trips.'], function ()
    {
        Route::get('', [TripController::class, 'adminIndex'])->name('index');
        Route::get('create', [TripController::class, 'create'])->name('create');
        Route::post('store', [TripController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{trip}'], function ()
        {
            Route::delete('destroy', [TripController::class, 'destroy'])->name('destroy');
            Route::get('edit', [TripController::class, 'edit'])->name('edit');
            Route::post('update', [TripController::class, 'update'])->name('update');
        });

        Route::get('search', [TripController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'electives', 'as' => 'electives.'], function ()
    {
        Route::get('', [ElectiveController::class, 'adminIndex'])->name('index');
        Route::get('create', [ElectiveController::class, 'create'])->name('create');
        Route::post('store', [ElectiveController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{elective}'], function ()
        {
            Route::delete('destroy', [ElectiveController::class, 'destroy'])->name('destroy');
            Route::get('edit', [ElectiveController::class, 'edit'])->name('edit');
            Route::post('update', [ElectiveController::class, 'update'])->name('update');
        });

        Route::get('search', [ElectiveController::class, 'searchIndex'])->name('search');
    });

    Route::group([ 'prefix' => 'books', 'as' => 'books.'], function ()
    {
        Route::get('', [BookController::class, 'adminIndex'])->name('index');
        Route::get('create', [BookController::class, 'create'])->name('create');
        Route::post('store', [BookController::class, 'store'])->name('store');

        Route::group([ 'prefix' => '{book}'], function ()
        {
            Route::delete('destroy', [BookController::class, 'destroy'])->name('destroy');
            Route::get('edit', [BookController::class, 'edit'])->name('edit');
            Route::post('update', [BookController::class, 'update'])->name('update');
        });

        Route::get('search', [BookController::class, 'searchIndex'])->name('search');
    });
});
//});


require __DIR__.'/auth.php';
