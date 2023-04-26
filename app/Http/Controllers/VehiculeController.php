<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Fournisseur;
use App\Models\Status;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        // On récupère tous les véhicules, les statuts, les agences et les fournisseurs depuis leur table respective
        $vehicule = Vehicule::all();
        $status = Status::all();
        $agences = Agence::all();
        $fournisseurs = Fournisseur::all();

        // On retourne la vue 'vehicule/index' avec les variables associées à leur tableau respectif
        return view('vehicule/index', [
            'vehicule' => $vehicule,
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs
        ]);
    }

    public function create()
    {
        // On récupère tous les statuts, les agences et les fournisseurs depuis leur table respective
        $status = Status::all();
        $agences = Agence::all();
        $fournisseurs = Fournisseur::all();

        // On retourne la vue 'vehicule/create' avec les variables associées à leur tableau respectif
        return view('vehicule/create', [
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'model' => 'required',
            'last_maintenance' => 'required',
            'nb_kilometrage' => 'required',
            'nb_serie' => 'required',
            'agence_id' => 'required',
            'fournisseur_id' => 'required',
        ],[
            'marque.required' => 'La marque est requise',
            'model.required' => 'Le modèle est requis',
            'last_maintenance.required' => 'La dernière maintenance est requise',
            'nb_kilometrage.required' => 'Le nombre de kilométrage est requis',
            'nb_serie.required' => 'Le numero de série est requis',
            'agence_id.required' => 'Le nom de l\'agence est requis',
            'fournisseur_id.required' => 'Le nom du fournisseur est requis',
        ]);
        // On crée un nouveau véhicule avec les données récupérées du formulaire
        $vehicule = Vehicule::create([
            'model' => $request->model,
            'marque' => $request->marque,
            'last_maintenance' => $request->last_maintenance,
            'nb_kilometrage' => $request->nb_kilometrage,
            'nb_serie' => $request->nb_serie,
            // On récupère l'id du statut "Libre" depuis la table des statuts et on l'associe à notre véhicule
            'status_id' => Status::where('label', 'Libre')->first()->id,
            'agence_id' => $request->agence_id,
            'fournisseur_id' => $request->fournisseur_id
        ]);

        // On redirige l'utilisateur vers la liste des véhicules
        return redirect()->route('dashboard.vehicule.index');
    }


    public function edit($id)
    {
        // Récupère l'enregistrement de véhicule qui correspond à l'identifiant passé en paramètre
        $vehicule = Vehicule::find($id);

        // Récupère tous les enregistrements de statut, d'agence et de fournisseur
        $status = Status::all();
        $agences = Agence::all();
        $fournisseurs = Fournisseur::all();

        // Retourne la vue edit avec les enregistrements de véhicule, statut, agence et fournisseur passés à la vue comme données
        return view('vehicule.edit', [
            'vehicule' => $vehicule,
            'status' => $status,
            'agence' => $agences,
            'fournisseur' => $fournisseurs
        ]);
    }

    public function update(Vehicule $id, Request $request)
    {
        // Valide les données de la requête
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

        // Met à jour les données de véhicule avec les données validées
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

        // Redirige l'utilisateur vers la page de liste de véhicule
        return response()->redirectToRoute('dashboard.vehicule.index');
    }

    public function delete($id)
    {
        // Récupère l'enregistrement de véhicule qui correspond à l'identifiant passé en paramètre
        $vehicule = Vehicule::findOrFail($id);

        // Supprime l'enregistrement de véhicule
        $vehicule->delete();

        // Redirige l'utilisateur vers la page de liste de véhicule avec un message de succès
        return response()->redirectToRoute('dashboard.vehicule.index')->with('success', 'Voiture supprimer avec succèss');
    }
}
