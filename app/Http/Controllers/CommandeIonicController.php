<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Vehicule;

class CommandeIonicController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date',
            'users_id' => 'required|integer|exists:users,id',
            'vehicule_id' => 'required|integer|exists:vehicule,id',
        ]);
        $commande = Commande::create($validatedData);
        $vehicule = Vehicule::where('id', $request->vehicule_id);
        $vehicule->update(['status_id'=>"3"]);



        return response()->json($commande, 201);
    }

    public function show($userId)
    {
        $commandes = Commande::where('users_id', $userId)->with('vehicule')->get();

        return response()->json($commandes);
    }

}
