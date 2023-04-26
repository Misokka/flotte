<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ChefagenceController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehiculeFournisseurController;
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

Route::get('/dashboard', [DashboardController::class, 'index'], function () {return view('dashboard'); })->middleware(['auth'])->name('dashboard');

Route::prefix('/dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){
    Route::middleware('roles:Admin,RH')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name("user.index");
        Route::get('/users/show/{id}', [UserController::class,'show'])->name("user.show");
        Route::get('/users/create', [UserController::class, 'create'])->name("user.create");
        Route::post('/users/store', [UserController::class, 'store'])->name("user.store");
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name("user.edit");
        Route::put('/users/update/{id}', [UserController::class, 'update'])->name("user.update");
        Route::delete('/users/delete/{id}', [UserController::class, 'delete'])->name("user.delete");
    });
    Route::middleware('roles:Admin,Gestionnaire_d_agences')->group(function () {
        Route::get('/vehicule', [VehiculeController::class, 'index'])->name("vehicule.index");
        Route::get('/vehicule/create', [VehiculeController::class, 'create'])->name("vehicule.create");
        Route::post('/vehicule/store', [VehiculeController::class, 'store'])->name("vehicule.store");
        Route::get('/vehicule/edit/{id}', [VehiculeController::class, 'edit'])->name("vehicule.edit");
        Route::put('/vehicule/update/{id}', [VehiculeController::class, 'update'])->name("vehicule.update");
        Route::put('/vehicule/update/{id}', [VehiculeController::class, 'update'])->name("vehicule.update");
        Route::delete('/vehicule/delete/{id}', [VehiculeController::class, 'delete'])->name("vehicule.delete");
        Route::get('/agence', [AgenceController::class, 'index'])->name("agence.index");
        Route::get('/agence/create', [AgenceController::class, 'create'])->name("agence.create");
        Route::post('/agence/store', [AgenceController::class, 'store'])->name("agence.store");
        Route::get('/agence/edit/{id}', [AgenceController::class, 'edit'])->name("agence.edit");
        Route::put('/agence/update/{id}', [AgenceController::class, 'update'])->name("agence.update");
        Route::put('/agence/update/{id}', [AgenceController::class, 'update'])->name("agence.update");
        Route::delete('/agence/delete/{id}', [AgenceController::class, 'delete'])->name("agence.delete");
    });
    Route::middleware('roles:Admin,Gestionnaire Fournisseurs')->group(function () {
        Route::get('/fournisseur', [FournisseurController::class, 'index'])->name("fournisseur.index");
        Route::get('/fournisseur/create', [FournisseurController::class, 'create'])->name("fournisseur.create");
        Route::get('/fournisseur/vehicule/{id}', [FournisseurController::class, 'vehicule'])->name('fournisseur.vehicule');
        Route::post('/fournisseur/store', [FournisseurController::class, 'store'])->name("fournisseur.store");
        Route::get('/fournisseur/edit/{id}', [FournisseurController::class, 'edit'])->name("fournisseur.edit");
        Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'])->name("fournisseur.update");
        Route::put('/fournisseur/update/{id}', [FournisseurController::class, 'update'])->name("fournisseur.update");
        Route::delete('/fournisseur/delete/{id}', [FournisseurController::class, 'delete'])->name("fournisseur.delete");
        Route::get('/vehiculefournisseur', [VehiculeFournisseurController::class, 'index'])->name("vehiculefournisseur.index");
        Route::get('/vehiculefournisseur/create', [VehiculeFournisseurController::class, 'create'])->name("vehiculefournisseur.create");
        Route::post('/vehiculefournisseur/store', [VehiculeFournisseurController::class, 'store'])->name("vehiculefournisseur.store");
        Route::get('/vehiculefournisseur/edit/{id}', [VehiculeFournisseurController::class, 'edit'])->name("vehiculefournisseur.edit");
        Route::put('/vehiculefournisseur/update/{id}', [VehiculeFournisseurController::class, 'update'])->name("vehiculefournisseur.update");
        Route::put('/vehiculefournisseur/update/{id}', [VehiculeFournisseurController::class, 'update'])->name("vehiculefournisseur.update");
        Route::delete('/vehiculefournisseur/delete/{id}', [VehiculeFournisseurController::class, 'delete'])->name("vehiculefournisseur.delete");
    });
    Route::middleware('roles:Admin,Gestionnaire Commandes')->group(function () {
        Route::get('/commande', [CommandeController::class, 'index'])->name("commande.index");
        Route::get('/commande/create', [CommandeController::class, 'create'])->name("commande.create");
        Route::post('/commande/store', [CommandeController::class, 'store'])->name("commande.store");
        Route::get('/commande/edit/{id}', [CommandeController::class, 'edit'])->name("commande.edit");
        Route::put('/commande/update/{id}', [CommandeController::class, 'update'])->name("commande.update");
        Route::put('/commande/update/{id}', [CommandeController::class, 'update'])->name("commande.update");
        Route::delete('/commande/delete/{id}', [CommandeController::class, 'delete'])->name("commande.delete");
    });
    Route::middleware('roles:Chef_d_Agence')->group(function () {
        Route::get('/chefagence', [ChefagenceController::class, 'index'])->name("chefagence.index");
        Route::get('/chefagence/edit/{id}', [ChefagenceController::class, 'edit'])->name("chefagence.edit");
        Route::put('/chefagence/update/{id}', [ChefagenceController::class, 'update'])->name("chefagence.update");
        Route::put('/chefagence/update/{id}', [ChefagenceController::class, 'update'])->name("chefagence.update");
    });


});

require __DIR__.'/auth.php';
