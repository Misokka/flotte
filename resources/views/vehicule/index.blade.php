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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Liste des véhicules</h2>
            <a class="btn btn-light" href="{{ route('dashboard.vehicule.create') }}">Ajouter un véhicule</a>
          </div>
          <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="w-full table-auto">
              <thead class="bg-gray-200">
                <tr>
                  <th class="px-4 py-2 text-center">Marque</th>
                  <th class="px-4 py-2 text-center">Modèle</th>
                  <th class="px-4 py-2 text-center">Dernière maintenance</th>
                  <th class="px-4 py-2 text-center">Nombre de kilomètres</th>
                  <th class="px-4 py-2 text-center">Numéro de série</th>
                  <th class="px-4 py-2 text-center">Statut</th>
                  <th class="px-4 py-2 text-center">Agence</th>
                  <th class="px-4 py-2 text-center">Fournisseur</th>

                  <th class="px-4 py-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @if ($vehicule->isEmpty())
                  <tr>
                    <td colspan="9" class="px-4 py-2 text-center">Aucun véhicule à afficher</td>
                  </tr>
                @else
                @foreach ($vehicule as $vehicul)
                  <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 text-center">{{ $vehicul->marque }}</td>
                    <td class="px-4 py-2 text-center">{{ $vehicul->model }}</td>
                    <td class="px-4 py-2 text-center">{{ \Carbon\Carbon::parse($vehicul->last_maintenance)->format('d/m/Y h:i') }}</td>
                    <td class="px-4 py-2 text-center">{{ $vehicul->nb_kilometrage }} Km</td>
                    <td class="px-4 py-2 text-center">{{ $vehicul->nb_serie }}</td>
                    <td class="px-4 py-2 text-center">{{ $vehicul->status->label }}</td>
                    <td class="px-4 py-2 text-center">{{ $vehicul->agence->label }}</td>
                    <td class="px-4 py-2 text-center">{{ $vehicul->fournisseur->label }}</td>
                    <td class="text-center">
                      <a class="btn btn-light btn-block" role="button" href="{{ route('dashboard.vehicule.edit', ['id' => $vehicul->id]) }}">Modifier</a>
                      <form action="{{ route('dashboard.vehicule.delete', ['id' => $vehicul->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
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
