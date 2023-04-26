<?php

namespace App\Http\Controllers; // Espace de noms pour le contrôleur

use App\Models\Agence; // Importe le modèle Agence
use App\Models\User; // Importe le modèle User
use Illuminate\Http\Request; // Importe la classe Request

class AgenceController extends Controller // Définit une classe AgenceController qui étend la classe Controller
{
    public function index() // Définit une méthode pour la page d'index
    {
        $agence = Agence::all(); // Récupère toutes les agences depuis la base de données
        $users = User::all(); // Récupère tous les utilisateurs depuis la base de données

        return view('agence/index', [ // Retourne une vue avec les agences et les utilisateurs
            'agences' => $agence,
            'users' => $users
        ]);
    }

        public function create() // Définit une méthode pour la création d'une nouvelle agence
        {
            $users = User::all(); // Récupère tous les utilisateurs depuis la base de données

            return view('agence/create', [ // Retourne une vue avec les utilisateurs
                'users' => $users,
            ]);
        }

        public function store(Request $request) // Définit une méthode pour enregistrer une nouvelle agence dans la base de données
        {
            $request->validate([
                'label' => 'required',
            ], [
                'label.required' => 'Le nom de l\'agence est requis',
            ]);

            $agence = new Agence(); // Crée une nouvelle instance de Agence
            $agence->users_id = $request->users_id; // Associe l'utilisateur à l'agence
            $agence->label = $request->label; // Ajoute une étiquette à l'agence
            $agence->save(); // Enregistre l'agence dans la base de données

            return response()->redirectToRoute('dashboard.agence.index'); // Redirige l'utilisateur vers la page d'index des agences
        }

    public function edit($id) // Définit une méthode pour la modification d'une agence
    {
        $agence = Agence::find($id); // Récupère l'agence correspondante depuis la base de données
        $users = User::all(); // Récupère tous les utilisateurs depuis la base de données

        return view('agence.edit', [ // Retourne une vue avec l'agence et les utilisateurs
            'agence' => $agence,
            'users' => $users,
        ]);
    }

     public function update(Agence $id, Request $request) // Définit une méthode pour mettre à jour les informations d'une agence
     {

        $validate = $request->validate([ // Valide les informations de la requête
            'label' => 'string',
            'users_id' => 'numeric'
        ]);

        $id->update([ // Met à jour l'agence correspondante avec les nouvelles informations
            'label' => $validate['label'],
            'users_id' => $validate['users_id'],
        ]);

        return response()->redirectToRoute('dashboard.agence.index'); // Redirige l'utilisateur vers la page d'index des agences
     }

     public function delete($id) // Définit une méthode pour supprimer une agence
    {
        $agence = Agence::findOrFail($id); // Récupère l'agence correspondante depuis la base de données en cas d'erreur
        $agence->delete(); // Supprime l'agence de la base de données

        return response()->redirectToRoute('dashboard.agence.index')->with('success', 'Voiture supprimer avec succèss');
     }
}
