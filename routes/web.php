<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ToetsController;
use App\Http\Controllers\UitjeController;
use App\Http\Controllers\KeuzeController;
use App\Http\Controllers\BoekController;
use App\Http\Controllers\GebruikerController;

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

Route::get('/', function () {
    return view('welcome');
});

//route is used for navigating between user and admin dashboard
Route::get('redirects', 'App\Http\Controllers\HomeController@adminDashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// user routing
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    //public function dashboard staat in de HomeController
    Route::get('/user/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/user/toetsen', [ToetsController::class, 'toets'])->name('toetsen');
    Route::get('/user/uitjes', [UitjeController::class, 'uitje'])->name('uitjes');
    Route::get('/user/keuzedelen', [KeuzeController::class, 'keuze'])->name('keuzedelen');
    Route::get('/user/boekenlijst', [BoekController::class, 'boek'])->name('boekenlijst');
});

// admin routing
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    //public function adminDashboard staat in de HomeController
    Route::get('/admin/admin_dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/admin_toetsen', [ToetsController::class, 'toets'])->name('admin.toetsen');
    Route::get('/admin/admin_uitjes', [UitjeController::class, 'uitje'])->name('admin.uitjes');
    Route::get('/admin/admin_keuzedelen', [KeuzeController::class, 'keuze'])->name('admin.keuzedelen');
    Route::get('/admin/admin_boekenlijst', [BoekController::class, 'boek'])->name('admin.boekenlijst');
    Route::get('/admin/admin_gebruikers', [GebruikerController::class, 'gebruiker'])->name('admin.gebruikers');
});  

require __DIR__.'/auth.php';
