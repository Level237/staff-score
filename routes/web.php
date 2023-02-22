<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ajouter les routes ou les vues de l'administrateur ici
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
});

// Ajouter les routes ou les vues des employees ici
Route::middleware(['auth','employee'])->name('employee.')->prefix('employee')->group(function(){

    Route::get('dashboard',[EmployeeDashboardController::class,'index'])->name('dashboard');

});

Route::get('das',function(){

    return view('log');
});
require __DIR__.'/auth.php';
