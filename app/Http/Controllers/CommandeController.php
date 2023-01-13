<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commande = Commande::all();
        $vehicule = Vehicule::all();
        $users = User::all();

        return view('commande/index', [
            'commandes' => $commande,
            'vehicules' => $vehicule,
            'users' => $users
        ]);
    }

    public function create()
    {
        $vehicules = Vehicule::all();
        $users = User::all();

        return view('commande/create', [
            'vehicules' => $vehicules,
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $commande = new Commande();
        $commande->users_id = $request->users_id;
        $commande->vehicule_id = $request->vehicule_id;
        $commande->save();

        return response()->redirectToRoute('dashboard.commande.index');
    }
}
