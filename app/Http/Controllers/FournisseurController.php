<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    // Méthode pour afficher tous les fournisseurs
    public function index()
    {
        // Récupérer tous les fournisseurs à partir de la base de données
        $fournisseur = Fournisseur::all();

        // Retourne la vue fournisseur/index avec les fournisseurs récupérés
        return view('fournisseur/index', [
            'fournisseurs' => $fournisseur
        ]);
    }

    // Méthode pour afficher le formulaire de création d'un fournisseur
    public function create()
    {
        // Retourne la vue fournisseur/create
        return view('fournisseur/create');
    }

    // Méthode pour créer un nouveau fournisseur
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
        ], [
            'label.required' => 'Le nom du fournisseur est requis',
        ]);
        // Créer un nouvel objet fournisseur
        $fournisseur = new Fournisseur();

        // Affecter la valeur du champ 'label' à partir de la requête reçue
        $fournisseur->label = $request->label;

        // Enregistrer le fournisseur dans la base de données
        $fournisseur->save();

        // Rediriger l'utilisateur vers la page des fournisseurs
        return response()->redirectToRoute('dashboard.fournisseur.index');
    }

    // Méthode pour afficher le formulaire de modification d'un fournisseur
    public function edit($id)
    {
        // Récupérer le fournisseur à partir de son id
        $fournisseur = Fournisseur::find($id);

        // Retourne la vue fournisseur/edit avec le fournisseur récupéré
        return view('fournisseur.edit', ['fournisseur' => $fournisseur]);
    }

    public function update(Fournisseur $id, Request $request)
    {
        // validation de la requête
        $validate = $request->validate([
            'label' => 'string',
        ]);

        // mise à jour des informations de fournisseur
        $id->update([
            'label' => $validate['label'],
        ]);

        // redirection vers la page d'index
        return response()->redirectToRoute('dashboard.fournisseur.index');
    }

    public function delete($id)
    {
        // trouver le fournisseur à partir de l'ID
        $fournisseur = Fournisseur::findOrFail($id);

        // supprimer le fournisseur
        $fournisseur->delete();

        // redirection vers la page d'index avec un message de succès
        return response()->redirectToRoute('dashboard.fournisseur.index')->with('success', 'Fournisseur supprimé avec succès');
    }

    public function vehicule($id)
    {
        // trouver le fournisseur à partir de l'ID
        $fournisseur = Fournisseur::find($id);

        // trouver tous les véhicules associés à ce fournisseur
        $vehicule = Vehicule::with('fournisseur')->where('fournisseur_id', $id)->get();

        // retourner la vue des véhicules avec le fournisseur et les véhicules associés
        return view('vehicule.index', compact('fournisseur', 'vehicule'));
    }
}
