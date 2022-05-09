<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculeController;
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




Route::get('/', function () {return view('dashboard'); });
Route::get('/dashboard', function () {return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::prefix('/dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name("user.index");
    Route::get('/users/show/{id}', [UserController::class,'show'])->name("user.show");
    Route::get('/users/create', [UserController::class, 'create'])->name("user.create");
    Route::post('/users/store', [UserController::class, 'store'])->name("user.store");
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name("user.edit");
    Route::put('/users/update/{id}', [UserController::class, 'update'])->name("user.update");
    Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name("user.delete");
    Route::get('/vehicule', [VehiculeController::class, 'index'])->name("vehicule.index");
    Route::get('/vehicule/create', [VehiculeController::class, 'create'])->name("vehicule.create");
    Route::post('/vehicule/store', [VehiculeController::class, 'store'])->name("vehicule.store");
    Route::get('/vehicule/edit/{id}', [VehiculeController::class, 'edit'])->name("vehicule.edit");
    Route::put('/vehicule/update/{id}', [VehiculeController::class, 'update'])->name("vehicule.update");
    Route::put('/vehicule/update/{id}', [VehiculeController::class, 'update'])->name("vehicule.update");
    Route::delete('/vehicule/delete/{id}', [VehiculeController::class, 'delete'])->name("vehicule.delete");
});

require __DIR__.'/auth.php';
