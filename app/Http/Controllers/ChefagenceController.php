<?php

// Définition de l'espace de noms pour le contrôleur
namespace App\Http\Controllers;

// Import des classes Request, Agence, Fournisseur, Status, User et Vehicule
use Illuminate\Http\Request;
use App\Models\Agence;
use App\Models\Fournisseur;
use App\Models\Status;
use App\Models\User;
use App\Models\Vehicule;

// Définition de la classe ChefagenceController qui étend la classe Controller
class ChefagenceController extends Controller
{
    // Définition d'une méthode pour afficher une vue d'ensemble de l'agence
    public function index()
    {
        // Récupération de toutes les agences, de tous les utilisateurs et de tous les véhicules
        $agence = Agence::all();
        $users = User::all();
        $vehicule = Vehicule::all();


        // Retourne une vue en passant les données récupérées à la vue chefagence/index
        return view('chefagence/index', [
            'agences' => $agence,
            'users' => $users,
            'vehicule' => $vehicule,
        ]);
    }

    // Définition d'une méthode pour éditer un véhicule
    public function edit($id)
    {
        // Récupération du véhicule à éditer ainsi que tous les statuts, toutes les agences et tous les fournisseurs
        $vehicule = Vehicule::find($id);
        $status = Status::all();
        $agences = Agence::all();
        $fournisseurs = Fournisseur::all();

        // Retourne une vue en passant les données récupérées à la vue chefagence.edit
        return view('chefagence.edit', [
            'vehicule' => $vehicule,
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs
        ]);
    }

    // Définition d'une méthode pour mettre à jour un véhicule
    public function update(Vehicule $id, Request $request)
    {
        // Validation de la requête pour s'assurer que le champ status_id est numérique
        $validate = $request->validate([
            'status_id' => 'numeric',
        ]);

        // Mise à jour du véhicule avec le nouveau status_id
        $id->update([
            'status_id' => $validate['status_id'],
        ]);

        // Redirection vers l'index de l'agence avec un message de succès
        return response()->redirectToRoute('dashboard.chefagence.index');
    }

    // Définition d'une méthode pour supprimer une agence
    public function delete($id)
    {
        // Récupération de l'agence à supprimer
        $agence = Agence::findOrFail($id);
        $agence->delete();

        // Redirection vers l'index des agences avec un message de succès
        return response()->redirectToRoute('dashboard.agence.index')->with('success', 'Voiture supprimer avec succèss');
    }
}
