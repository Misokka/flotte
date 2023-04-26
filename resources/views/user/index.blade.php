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
    <x-slot name="header">
        <!-- Définition de l'en-tête de la page -->
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <!-- Affichage d'un titre et d'un bouton pour ajouter un utilisateur -->
                <h2 class="text-2xl font-bold">Liste des utilisateurs</h2>
                <a class="btn btn-light" href="{{ route('dashboard.user.create') }}">Ajouter un utilisateur</a>
            </div>
            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Affichage des données des utilisateurs sous forme de tableau -->
                <table class="w-full table-auto">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2 text-center">Prénom</th>
                            <th class="px-4 py-2 text-center">Nom</th>
                            <th class="px-4 py-2 text-center">Email</th>
                            <th class="px-4 py-2 text-center">Role</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Boucle pour afficher les données de chaque utilisateur -->
                        @if ($users->isEmpty())
                            <tr>
                                <td colspan="9" class="px-4 py-2 text-center">Aucun utilisateur à afficher</td>
                            </tr>
                        @else
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 text-center">{{ $user->firstname }}</td>
                                <td class="px-4 py-2 text-center">{{ $user->lastname }}</td>
                                <td class="px-4 py-2 text-center">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-center">{{ $user->roles->name }}</td>
                                <td class="text-center">
                                    <!-- Bouton pour modifier un utilisateur -->
                                    <a class="btn btn-light btn-block" role="button"
                                        href="{{ route('dashboard.user.edit', ['id' => $user->id]) }}">Modifier</a>
                                    <!-- Formulaire pour supprimer un utilisateur -->
                                    <form action="{{ route('dashboard.user.delete', ['id' => $user->id]) }}"
                                        method="post">
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
