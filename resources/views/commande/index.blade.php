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
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table cellpadding="60.5" cellspacing="30">
                        <thead>
                            <tr>
                                <th>N° de la commande</th>
                                <th>Utilisateur</th>
                                <th>Marque du véhicule</th>
                                <th>Model du véhicule</th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                                <tr>
                                    <td>{{ $commande->id }}</td>
                                    <td>{{ $commande->user->firstname }} {{ $commande->user->lastname }}</td>
                                    <td>{{ $commande->vehicule->marque }}</td>
                                    <td>{{ $commande->vehicule->model }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('dashboard.commande.create') }}">Passer une commande</a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
