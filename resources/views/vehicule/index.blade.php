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
            {{ __('FlexiFleet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table cellpadding="60.5" cellspacing="30">
                        <tr>
                          <th>Marque</th>
                          <th>Model</th>
                          <th>Dernière maintenance</th>
                          <th>Nombre de kilomètres</th>
                          <th>Numéro de série</th>
                          <th>Action</th>
                        </tr>
                    @foreach ($vehicule as $vehicul)
                        <tr>
                          <td>{{ $vehicul->marque }}</td>
                          <td>{{ $vehicul->model }}</td>
                          <td>{{ \Carbon\Carbon::parse($vehicul->last_maintenance)->format('d/m/Y h:i') }}</td>
                          <td>{{ $vehicul->nb_kilometrage }} Km</td>
                          <td>{{ $vehicul->nb_serie }}</td>
                          <td>
                            <a href="{{ route('dashboard.vehicule.edit', ['id' => $vehicul->id]) }}">Modifier</a>
                        <form action="{{ route('dashboard.vehicule.delete', ['id' => $vehicul->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <a href="dashboard.vehicule.delete">
                                <button href="">Supprimer</button>
                            </a>
                        <form>
                          </td>
                        </tr>
                    @endforeach
                    </table>
                    <a href="{{ route('dashboard.vehicule.create') }}">Ajouter un vehicule</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
