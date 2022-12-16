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
                    <a href="{{ route('dashboard.vehicule.index') }}">Vehicule</a> </br>
                    <a href="{{ route('dashboard.user.index') }}">Liste d'utilisateur</a> </br>
                    <a href="{{ route('dashboard.fournisseur.index') }}">Liste de fournisseur</a> </br>
                    <a href="{{ route('dashboard.agence.index') }}">Liste d'agence</a> </br>
                    <a href="{{ route('dashboard.commande.index') }}">Passer une commande</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
