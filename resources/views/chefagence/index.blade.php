<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    table {
        border: thin solid #000000;
        width: 50%;
        text-align: center;
    }

    td,
    th {
        border: thin solid #e5e7eb;
        width: 50%;
    }
</style>
<x-app-layout>
    <!-- C'est un composant Laravel pour la structure de la page, qui est appelé dans les fichiers blade.php -->
    <x-slot name="header">
        <!-- Définition d'une fente de composant pour l'en-tête -->
        @foreach ($agences as $agence)
            <!-- Boucle à travers la liste d'agences -->
            @if (Auth::user()->id == $agence->users_id)
                <!-- Condition qui vérifie si l'utilisateur actuel est associé à cette agence -->
                <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                    {{ $agence->label }}
                    <!-- Affiche le nom de l'agence -->
                </h2>
            @endif
        @endforeach
    </x-slot>

    <div class="py-12">
        <!-- Div contenant tout le contenu de la page -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Div pour définir la largeur maximale de la page et les marges horizontales -->
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Div contenant la table des véhicules -->
                <table class="w-full table-auto">
                    <!-- Définition de la table des véhicules -->
                    <thead class="bg-gray-200">
                        <!-- Définition de l'en-tête de la table -->
                        <tr>
                            <!-- Définition de la première ligne de la table -->
                            <th class="px-4 py-2 text-center">Nom des véhicules</th>
                            <!-- Définition de la première colonne -->
                            <th class="px-4 py-2 text-center">Actions</th> <!-- Définition de la deuxième colonne -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Définition du corps de la table -->
                        @foreach ($vehicule as $vehicul)
                            <!-- Boucle à travers la liste des véhicules -->
                            @if ($agence->id == $vehicul->agence_id)
                                <!-- Condition qui vérifie si le véhicule appartient à l'agence actuelle -->
                                <tr class="hover:bg-gray-100">
                                    <!-- Définition d'une ligne de la table, avec un effet de survol de la souris -->
                                    <td class="px-4 py-2 text-center">{{ $vehicul->marque }} {{ $vehicul->model }}</td>
                                    <!-- Affiche la marque et le modèle du véhicule -->
                                    <td class="text-center">
                                        <a class="btn btn-light" role="button"
                                            href="{{ route('dashboard.chefagence.edit', ['id' => $vehicul->id]) }}">Modifier</a>
                                        <!-- Bouton pour éditer le véhicule -->
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
