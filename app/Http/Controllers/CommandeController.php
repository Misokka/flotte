<?php

namespace App\Http\Controllers; // Espace de noms pour le contrôleur

use App\Models\Commande; // Importer le modèle Commande
use App\Models\Fournisseur; // Importer le modèle Fournisseur
use App\Models\Status; // Importer le modèle Status
use App\Models\User; // Importer le modèle User
use App\Models\Vehicule; // Importer le modèle Vehicule
use Illuminate\Http\Request; // Importer la classe Request

class CommandeController extends Controller // Définir la classe CommandeController qui étend la classe Controller
{
    public function index() // Définir la méthode pour afficher la liste des commandes
    {
        $commande = Commande::all(); // Obtenir toutes les commandes
        $vehicule = Vehicule::all(); // Obtenir tous les véhicules
        $users = User::all(); // Obtenir tous les utilisateurs
        $status = Status::all(); // Obtenir tous les statuts

        return view('commande/index', [ // Retourner la vue qui affiche la liste des commandes avec les données associées
            'commandes' => $commande,
            'vehicules' => $vehicule,
            'users' => $users,
            'status' => $status
        ]);
    }

    public function create() // Définir la méthode pour créer une nouvelle commande
    {
        $vehicule = Vehicule::all(); // Obtenir tous les véhicules
        $users = User::all(); // Obtenir tous les utilisateurs
        $status = Status::all(); // Obtenir tous les statuts
        $fournisseur = Fournisseur::all(); // Obtenir tous les fournisseurs

        return view('commande.create', [ // Retourner la vue qui affiche le formulaire de création de commande avec les données associées
            'vehicules' => $vehicule,
            'users' => $users,
            'status' => $status,
            'fournisseur' => $fournisseur
        ]);

        return response()->json(['key' => 'value']); // Retourner une réponse JSON si nécessaire
    }

    public function store(Request $request) // Définir la méthode pour enregistrer une nouvelle commande
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required',
            'fournisseur_id' => 'required',
            'vehicule_id' => 'required',
            'users_id' => 'required',
        ],[
            'firstnamed.required' => 'Le prenom est requis',
            'lastname.required' => 'Le nom est requis',
            'email.required' => 'Le mail est requis',
            'dateDebut.required' => 'Le date de début est requise',
            'dateFin.required' => 'Le date de fin est requise',
            'vehicule_id.required' => 'Le véhicule est requis',
            'fournisseur_id.required' => 'Le fournisseur est requis',
            'vehicule_id.required' => 'Le véhicule est requis',
        ]);


        $commande = new Commande(); // Créer une nouvelle instance de Commande
        $commande->firstname = $request->firstname;
        $commande->lastname = $request->lastname;
        $commande->email = $request->email;
        $commande->dateDebut = $request->dateDebut;
        $commande->dateFin = $request->dateFin;
        $commande->users_id = $request->users_id; // Définir l'utilisateur qui a créé la commande
        $commande->vehicule_id = $request->vehicule_id; // Définir le véhicule de la commande
        $commande->save(); // Enregistrer la commande

        $vehicule = Vehicule::find($request->vehicule_id); // Obtenir le véhicule associé à la commande
        $vehicule->status_id = 3; // Changer le statut du véhicule de 'disponible' (1) à 'indisponible' (2)
        $vehicule->save(); // Enregistrer le nouveau statut du véhicule

        return redirect()->route('dashboard.commande.index'); // Rediriger vers la liste des commandes
    }



    public function edit($id)
    {
        // Récupérer une commande spécifique en utilisant son identifiant
        $commande = Commande::find($id);

        // Récupérer tous les véhicules
        $vehicules = Vehicule::all();

        // Récupérer tous les utilisateurs
        $users = User::all();

        // Retourner la vue d'édition de commande avec la commande spécifique, tous les véhicules et tous les utilisateurs
        return view('commande.edit', [
            'commande' => $commande,
            'vehicules' => $vehicules,
            'users' => $users,
        ]);
    }

    public function update(Commande $id, Request $request)
    {
        // Valider les données saisies par l'utilisateur, lesquelles doivent être de type numérique
        $validate = $request->validate([
            'vehicule_id' => 'numeric',
            'users_id' => 'numeric'
        ]);

        // Mettre à jour la commande spécifiée en utilisant l'identifiant donné
        $id->update([
            'users_id' => $validate['users_id'],
            'vehicule_id' => $validate['vehicule_id'],
        ]);

        // Rediriger vers l'index des commandes
        return response()->redirectToRoute('dashboard.commande.index');
    }

    public function delete($id)
    {
        // Récupérer la commande spécifique en utilisant l'identifiant donné, en générant une exception s'il n'y a pas de commande correspondante
        $commande = Commande::findOrFail($id);

        // Récupérer le véhicule associé à la commande
        $vehicule = $commande->vehicule;

        // Réinitialiser le statut du véhicule associé à la commande
        $vehicule->status_id = 1;
        $vehicule->save();

        // Supprimer la commande
        $commande->delete();

        // Rediriger vers l'index des commandes
        return redirect()->route('dashboard.commande.index');
    }
}
