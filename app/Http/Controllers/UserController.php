<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;

class UserController extends Controller
{
    public function index()
    {
        // Récupération de l'utilisateur actuel
        Auth::user();

        // Récupération de tous les utilisateurs de la base de données
        $users = User::all();

        // Renvoi de la vue index en passant les utilisateurs récupérés en paramètre
        return view('user/index', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        // Récupération de l'utilisateur avec l'id fourni en paramètre
        $user = User::find($id);

        // Renvoi de la vue show en passant l'utilisateur récupéré en paramètre
        return view('user/show', ['user' => $user]);
    }

    public function create()
    {
        // Récupération de tous les rôles de la base de données
        $roles = Roles::all();

        // Renvoi de la vue create en passant les rôles récupérés en paramètre
        return view('user/create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ], [
            'firstname.required' => 'Le prénom de l\'utilisateur est requis',
            'lastname.required' => 'Le nom de l\'utilisateur est requis',
            'email.required' => 'L\'email de l\'utilisateur est requis',
        ]);

        // Création d'un nouvel utilisateur dans la base de données avec les données fournies par l'utilisateur
        $password = Str::random(10);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($password), // Génération d'un mot de passe aléatoire et cryptage
            'remember_token' => $request->remember_token,
            'roles_id' => $request->roles_id,
        ]);

        // Génération d'un nouveau mot de passe aléatoire

        // Cryptage du nouveau mot de passe et mise à jour de l'utilisateur dans la base de données

        // Envoi d'un e-mail à l'utilisateur avec ses informations de connexion

        $data = new stdClass();
        $data->email = $request->email;
        $data->password = $password;
        $data->firstname = $request->firstname;
        $data->lastname = $request->lastname;

        Mail::send('emails.user-created', ['data' => $data],function ($message) use ($data){
            $message->to($data->email);
        });

        // Redirection vers la page d'index des utilisateurs
        return redirect()->route('dashboard.user.index');
    }



    public function edit($id)
    {
        $user = User::find($id); // Récupère l'utilisateur correspondant à l'identifiant fourni
        $roles = Roles::all(); // Récupère tous les rôles

        return view('user.edit', ['user' => $user, 'roles' => $roles]); // Affiche le formulaire de modification de l'utilisateur avec les informations de l'utilisateur et la liste des rôles
    }

    public function update(User $id, Request $request)
    {

        $validate = $request->validate([
            'lastname' => 'string',
            'firstname' => 'string',
            'email' => 'string',
            'roles_id' => 'numeric'
        ]); // Valide les données envoyées par le formulaire

        $id->update([
            'lastname' => $validate['lastname'],
            'firstname' => $validate['firstname'],
            'email' => $validate['email'],
            'roles_id' => $validate['roles_id']
        ]); // Met à jour les informations de l'utilisateur avec les nouvelles données

        return response()->redirectToRoute('dashboard.user.index'); // Redirige l'utilisateur vers la liste des utilisateurs
    }

    public function delete($id)
    {
        $user = User::find($id); // Récupère l'utilisateur correspondant à l'identifiant fourni
        $user->delete(); // Supprime l'utilisateur de la base de données

        return redirect()->route('dashboard.user.index'); // Redirige l'utilisateur vers la liste des utilisateurs
    }
}
