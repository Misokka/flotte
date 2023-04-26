<!-- Importation du fichier CSS de Bootstrap à partir de CDN (Content Delivery Network) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Définition d'un style CSS pour les tables -->
<style>
table {
    border: thin solid #000000; /* bordure fine noire */
    width: 50%; /* largeur de 50% de la page */
    text-align: center; /* centrage du texte */
    }
    td, th {
    border: thin solid #e5e7eb; /* bordure fine gris clair */
    width: 50%; /* largeur de 50% de la page */
}
</style>

<!-- Utilisation d'un composant Laravel pour générer la page HTML -->
<x-app-layout>
    <!-- Définition d'un emplacement pour le titre de la page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agence') }} <!-- Affichage du titre de la page -->
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">Liste des agences</h2> <!-- Titre de la section -->
                <a class="btn btn-light" href="{{ route('dashboard.agence.create') }}">Ajouter une agence</a> <!-- Bouton pour ajouter une agence -->
            </div>
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="w-full table-auto"> <!-- Définition d'une table -->
                    <thead class="bg-gray-200"> <!-- Définition de l'en-tête de la table -->
                        <tr>
                            <th class="px-4 py-2 text-center">Nom de l'agence</th> <!-- Titre de la première colonne -->
                            <th class="px-4 py-2 text-center">Chef d'agence</th> <!-- Titre de la deuxième colonne -->
                            <th class="px-4 py-2 text-center">Actions</th> <!-- Titre de la troisième colonne -->
                        </tr>
                    </thead>
                    <tbody> <!-- Corps de la table -->
                        @if ($agences->isEmpty())
                            <tr>
                                <td colspan="9" class="px-4 py-2 text-center">Aucune agence à afficher</td>
                            </tr>
                        @else
                        <!-- Boucle qui affiche les données de chaque agence -->
                        @foreach ($agences as $agence)
                        <tr class="hover:bg-gray-100"> <!-- Ajout d'un effet de survol sur chaque ligne de la table -->
                            <td class="px-4 py-2 text-center">{{ $agence->label }}</td> <!-- Affichage du nom de l'agence dans la première colonne -->
                            <td class="px-4 py-2 text-center">{{ $agence->user->firstname }} {{ $agence->user->lastname }}</td> <!-- Affichage du nom et du prénom du chef d'agence dans la deuxième colonne -->
                            <td class="text-center">
                                <a class="btn btn-light btn-block" role="button" href="{{ route('dashboard.agence.edit', ['id' => $agence->id]) }}">Modifier</a>
                                <form action="{{ route('dashboard.agence.delete', ['id' => $agence->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-light btn-block" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
