<x-app-layout>
    <!-- Appel d'un template pour la mise en page -->
    <x-slot name="header">
        <!-- Emplacement où on peut mettre du contenu pour l'en-tête -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agence') }}
            <!-- Affiche "Agence" -->
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Ajout d'une marge en haut et en bas -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Éléments centrés et avec une marge sur les côtés -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Bloc blanc avec une ombre et des coins arrondis -->
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Bloc blanc avec une marge et une bordure grise en bas -->
                    @if ($errors->any())
                        <!-- Si une erreur a été renvoyée, affiche la liste des erreurs -->
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <!-- Parcourt la liste des erreurs -->
                                    <li>{{ $error }}</li> <!-- Affiche chaque erreur -->
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('dashboard.chefagence.update', ['id' => $vehicule->id]) }}" method="post">
                        <!-- Formulaire pour la mise à jour d'un chef d'agence -->
                        @csrf
                        <!-- Protection contre les attaques CSRF -->
                        @method('PUT')
                        <!-- Utilisation de la méthode HTTP PUT pour la mise à jour -->
                        <div class="overflow-x-auto">
                            <!-- Ajout d'un défilement horizontal -->
                            <table class="table-auto w-full">
                                <!-- Tableau pour l'affichage des données -->
                                <thead>
                                    <tr class="bg-gray-100">
                                        <!-- Ligne en arrière-plan gris -->
                                        <th class="px-4 py-2 text-left">Status du véhicule</th>
                                        <!-- Colonne pour le statut du véhicule -->
                                        <th class="px-4 py-2 text-left">Action</th>
                                        <!-- Colonne pour les actions possibles -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border px-4 py-2 text-center">
                                            <select name="status_id">
                                                <!-- Liste déroulante pour la sélection du statut -->
                                                @foreach ($status as $statut)
                                                    <!-- Parcourt la liste des statuts -->
                                                    <option value="{{ $statut->id }}" {{ $vehicule->status_id }}>
                                                        {{ $statut->label }}</option>
                                                    <!-- Affiche chaque statut en tant qu'option -->
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Valider</button>
                                            <!-- Bouton de validation -->
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
