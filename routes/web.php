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

Route::middleware(['auth'])->group(function () {

    Route::get('websites/show2', [WebsiteController::class, 'show'])->name('show2');

    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::group([ 'prefix' => 'tests', 'as' => 'tests.'], function ()
    {
        Route::get('', [TestController::class, 'index'])->name('index');

        Route::group([ 'prefix' => '{test}'], function ()
        {
            Route::get('show', [TestController::class, 'show'])->name('show');
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
    Route::get('', function () {
        return view('admin.index');
    })->name('index');
    
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

    Route::group([ 'prefix' => 'websites', 'as' => 'websites.'], function ()
    {
        Route::get('', [WebsiteController::class, 'adminIndex'])->name('index');
        Route::get('create', [WebsiteController::class, 'adminCreate'])->name('create');
        Route::post('store', [WebsiteController::class, 'adminStore'])->name('store');

        Route::group([ 'prefix' => '{test}'], function ()
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
        });

        Route::get('search', [TestController::class, 'searchIndex'])->name('search');
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
});


require __DIR__.'/auth.php';
