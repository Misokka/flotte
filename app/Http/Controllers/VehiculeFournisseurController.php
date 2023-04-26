<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Vehicule;
use App\Models\Agence;

class VehiculeFournisseurController extends Controller
{
    public function index(Request $request)
    {
        // Récupère tous les véhicules du fournisseur dont l'ID est fourni dans la requête
        $vehicule = Vehicule::where('fournisseur_id', $request->fournisseur_id)->get();

        // Récupère tous les statuts de véhicule
        $status = Status::all();

        // Récupère toutes les agences
        $agences = Agence::all();

        // Récupère le fournisseur dont l'ID est fourni dans la requête
        $fournisseurs = Fournisseur::find($request->fournisseur_id);

        // Retourne la vue avec les données nécessaires
        return view('vehiculefournisseur/index', [
            'vehicule' => $vehicule,
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs
        ]);
    }

    public function create()
    {
        // Récupère tous les statuts de véhicule
        $status = Status::all();

        // Récupère toutes les agences
        $agences = Agence::all();

        // Récupère tous les fournisseurs
        $fournisseurs = Fournisseur::all();

        // Retourne la vue pour créer un nouveau véhicule avec les données nécessaires
        return view('vehiculefournisseur/create', [
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs,
        ]);
    }

    public function store(Request $request)
    {
        // Crée un nouveau véhicule avec les données fournies
        $vehicule = Vehicule::create([
            'model' => $request->model,
            'marque' => $request->marque,
            'last_maintenance' => $request->last_maintenance,
            'nb_kilometrage' => $request->nb_kilometrage,
            'nb_serie' => $request->nb_serie,

            // Récupère l'ID du statut de véhicule "Libre" et l'associe au nouveau véhicule
            'status_id' => Status::where('label', 'Libre')->first()->id,

            'agence_id' => $request->agence_id,
            'fournisseur_id' => $request->fournisseur_id
        ]);

        // Redirige vers la page de l'index du fournisseur
        return redirect()->route('dashboard.fournisseur.index');
    }


    public function edit($id)
    {
        // Trouve un véhicule spécifique en utilisant son identifiant
        $vehicule = Vehicule::find($id);

        // Obtient tous les statuts de véhicule
        $status = Status::all();

        // Obtient toutes les agences
        $agences = Agence::all();

        // Obtient tous les fournisseurs de véhicules
        $fournisseurs = Fournisseur::all();

        // Retourne la vue d'édition de véhicule avec les données précédemment obtenues
        return view('vehiculefournisseur.edit', [
            'vehicule' => $vehicule,
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs
        ]);
    }

    public function update(Vehicule $id, Request $request)
    {
        // Valide les données de la requête en utilisant les règles de validation données
        $validate = $request->validate([
            'model' => 'string',
            'marque' => 'string',
            'last_maintenance' => 'date',
            'nb_kilometrage' => 'string',
            'nb_serie' => 'string',
            'status_id' => 'numeric',
            'agence_id' => 'numeric',
            'fournisseur_id' => 'numeric',
        ]);

        // Met à jour les données du véhicule avec les données validées
        $id->update([
            'model' => $validate['model'],
            'marque' => $validate['marque'],
            'last_maintenance' => $validate['last_maintenance'],
            'nb_kilometrage' => $validate['nb_kilometrage'],
            'nb_serie' => $validate['nb_serie'],
            'status_id' => $validate['status_id'],
            'agence_id' => $validate['agence_id'],
            'fournisseur_id' => $validate['fournisseur_id'],
        ]);

        // Redirige vers la liste de véhicules en cas de succès
        return response()->redirectToRoute('dashboard.fournisseur.index');
    }

    public function delete($id)
    {
        // Trouve un véhicule spécifique en utilisant son identifiant
        $vehicule = Vehicule::findOrFail($id);

        // Supprime le véhicule
        $vehicule->delete();

        // Redirige vers la liste de véhicules en cas de succès et ajoute un message
        return response()->redirectToRoute('dashboard.fournisseur.index')->with('success', 'Voiture supprimer avec succès');
    }
}
