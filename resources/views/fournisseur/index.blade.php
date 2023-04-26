<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
table {
    border: thin solid #000000;
    width: 50%;
    text-align: center;
    }
    td, th {
    border: thin solid #e5e7eb;
    width: 50%;
}
</style>
<x-app-layout> <!-- Début de la section principale -->
    <x-slot name="header"> <!-- Début de l'en-tête -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fournisseur') }} <!-- Titre de la page : "Fournisseur" -->
        </h2>
    </x-slot> <!-- Fin de l'en-tête -->

    <div class="py-12"> <!-- Début de la section principale -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> <!-- Div pour centrer les éléments dans la page -->
          <div class="flex justify-between items-center"> <!-- Div pour aligner horizontalement les éléments -->
            <h2 class="text-2xl font-bold">Liste des fournisseurs</h2> <!-- Titre de la section : "Liste des fournisseurs" -->
            <a class="btn btn-light" href="{{ route('dashboard.fournisseur.create') }}">Ajouter un fournisseur</a> <!-- Bouton "Ajouter un fournisseur" qui redirige vers la page de création -->
          </div> <!-- Fin de la div pour aligner horizontalement les éléments -->
          <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg"> <!-- Div pour le tableau des fournisseurs -->
            <table class="w-full table-auto"> <!-- Tableau des fournisseurs -->
              <thead class="bg-gray-200"> <!-- En-tête du tableau -->
                <tr> <!-- Première ligne du tableau -->
                  <th class="px-4 py-2 text-center">Nom du fournisseur</th> <!-- Colonne pour le nom des fournisseurs -->
                  <th class="px-4 py-2 text-center">Véhicule</th> <!-- Colonne pour les véhicules des fournisseurs -->
                  <th class="px-4 py-2 text-center">Action</th> <!-- Colonne pour les actions possibles -->
                </tr>
              </thead>
              <tbody> <!-- Corps du tableau -->
                @if ($fournisseurs->isEmpty())
                    <tr>
                        <td colspan="9" class="px-4 py-2 text-center">Aucun fournisseur à afficher</td>
                    </tr>
                @else
                @foreach ($fournisseurs as $fourn) <!-- Boucle pour chaque fournisseur -->
                    <tr class="hover:bg-gray-100"> <!-- Ligne du tableau pour chaque fournisseur -->
                        <td class="px-4 py-2 text-center">{{ $fourn->label }}</td> <!-- Colonne pour le nom du fournisseur -->
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('dashboard.vehiculefournisseur.index', ['fournisseur_id' => $fourn->id]) }}" class="btn btn-light">Voir les véhicules</a> <!-- Bouton pour voir les véhicules du fournisseur -->
                        </td>
                        <td class="text-center">
                            <a class="btn btn-light btn-block" role="button" href="{{ route('dashboard.fournisseur.edit', ['id' => $fourn->id]) }}">Modifier</a> <!-- Bouton pour modifier le fournisseur -->
                            <form action="{{ route('dashboard.fournisseur.delete', ['id' => $fourn->id]) }}" method="post"> <!-- Formulaire pour supprimer le fournisseur -->
                                @csrf <!-- Protection CSRF -->
                                @method('DELETE') <!-- Utilisation de la méthode DELETE -->
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
