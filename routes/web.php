<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\CommandeController;
use Illuminate\Support\Facades\Auth;
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




Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('dashboard');;
    } else {
        return redirect()->route('login');
    }
});

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
    Route::get('/fournisseur', [FournisseurController::class, 'index'])->name("fournisseur.index");
    Route::get('/fournisseur/create', [FournisseurController::class, 'create'])->name("fournisseur.create");
    Route::post('/fournisseur/store', [FournisseurController::class, 'store'])->name("fournisseur.store");
    Route::get('/fournisseur/edit/{id}', [FournisseurController::class, 'edit'])->name("fournisseur.edit");
    Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'])->name("fournisseur.update");
    Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'])->name("fournisseur.update");
    Route::delete('/fournisseur/delete/{id}', [FournisseurController::class, 'delete'])->name("fournisseur.delete");
    Route::get('/agence', [AgenceController::class, 'index'])->name("agence.index");
    Route::get('/agence/create', [AgenceController::class, 'create'])->name("agence.create");
    Route::post('/agence/store', [AgenceController::class, 'store'])->name("agence.store");
    Route::get('/agence/edit/{id}', [AgenceController::class, 'edit'])->name("agence.edit");
    Route::put('/agence/update/{id}', [AgenceController::class, 'update'])->name("agence.update");
    Route::put('/agence/update/{id}', [AgenceController::class, 'update'])->name("agence.update");
    Route::delete('/agence/delete/{id}', [AgenceController::class, 'delete'])->name("agence.delete");
    Route::get('/commande', [CommandeController::class, 'index'])->name("commande.index");
    Route::get('/commande/create', [CommandeController::class, 'create'])->name("commande.create");
    Route::post('/commande/store', [CommandeController::class, 'store'])->name("commande.store");
});

require __DIR__.'/auth.php';
