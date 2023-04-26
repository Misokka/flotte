<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12"> <!-- Ajout d'un padding en haut et en bas -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <!-- Définition de la largeur et des marges -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> <!-- Ajout d'un arrière-plan blanc avec une ombre -->
                <div class="p-6 bg-white border-b border-gray-200"> <!-- Ajout d'un padding et d'une bordure en bas -->
                    @if ($errors->any()) <!-- Vérification s'il y a des erreurs -->
                    <div class="alert alert-danger"> <!-- Affichage d'une alerte en cas d'erreur -->
                        <ul>
                            @foreach ($errors->all() as $error) <!-- Boucle pour afficher chaque erreur -->
                                <li>{{ $error }}</li> <!-- Affichage de chaque erreur -->
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('dashboard.user.update', ['id' => $user->id]) }}" method="post"> <!-- Ouverture d'un formulaire pour la mise à jour de l'utilisateur avec la méthode POST -->
                        @csrf <!-- Ajout d'un jeton CSRF pour la sécurité -->
                        @method('PUT') <!-- Utilisation de la méthode PUT pour la mise à jour de l'utilisateur -->
                        <div class="overflow-x-auto"> <!-- Ajout d'un débordement horizontal -->
                            <table class="table-auto w-full"> <!-- Création d'un tableau -->
                                <thead>
                                    <tr class="bg-gray-100"> <!-- Ajout d'une ligne de tableau avec un arrière-plan gris -->
                                        <th class="px-4 py-2 text-left">Prenom</th> <!-- Ajout d'une colonne de tableau pour le prénom de l'utilisateur -->
                                        <th class="px-4 py-2 text-left">Nom</th> <!-- Ajout d'une colonne de tableau pour le nom de l'utilisateur -->
                                        <th class="px-4 py-2 text-left">Email</th> <!-- Ajout d'une colonne de tableau pour l'email de l'utilisateur -->
                                        <th class="px-4 py-2 text-left">Role</th> <!-- Ajout d'une colonne de tableau pour le rôle de l'utilisateur -->
                                        <th class="px-4 py-2 text-left">Action</th> <!-- Ajout d'une colonne de tableau pour l'action de validation -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr> <!-- Ajout d'une ligne de tableau pour l'utilisateur à modifier -->
                                        <td class="border px-4 py-2">
                                            <input type="text" name="firstname" placeholder="Prénom" value="{{ $user->firstname }}" class="w-full"> <!-- Champ de texte pour le prénom de l'utilisateur à modifier -->
                                        </td>
                                        <td class="border px-4 py-2"> <!-- colonne 1 de la table -->
                                            <input type="text" name="lastname" placeholder="Nom" value="{{ $user->lastname }}" class="w-full"> <!-- champ de saisie pour le nom de l'utilisateur avec la valeur par défaut enregistrée dans la variable $user->lastname -->
                                        </td>

                                        <td class="border px-4 py-2"> <!-- colonne 2 de la table -->
                                            <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" class="w-full"> <!-- champ de saisie pour l'e-mail de l'utilisateur avec la valeur par défaut enregistrée dans la variable $user->email -->
                                        </td>

                                        <td class="border px-4 py-2"> <!-- colonne 3 de la table -->
                                            <select name="roles_id" id="" class="w-full"> <!-- liste déroulante pour sélectionner un rôle -->
                                                @foreach ($roles as $role ) <!-- boucle qui parcourt chaque rôle -->
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option> <!-- option de la liste déroulante avec l'identifiant du rôle et le nom du rôle -->
                                                @endforeach
                                            </select>
                                        </td>

                                        <td class="border px-4 py-2"> <!-- colonne 4 de la table -->
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Valider</button> <!-- bouton pour soumettre le formulaire -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
