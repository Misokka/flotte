<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<x-app-layout>
    <!-- Début de la section d'en-tête -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur') }}
            <!-- Titre de la page -->
        </h2>
    </x-slot>
    <!-- Fin de la section d'en-tête -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('dashboard.user.store') }}" method="post">
                        @csrf
                        <!-- Protection contre les attaques CSRF -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2 text-left">Prenom</th>
                                        <!-- Colonne "Prénom" -->
                                        <th class="px-4 py-2 text-left">Nom</th>
                                        <!-- Colonne "Nom" -->
                                        <th class="px-4 py-2 text-left">Email</th>
                                        <!-- Colonne "Email" -->
                                        <th class="px-4 py-2 text-left">Role</th>
                                        <!-- Colonne "Rôle" -->
                                        <th class="px-4 py-2 text-left">Action</th>
                                        <!-- Colonne "Action" -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border px-4 py-2">
                                            @if ($errors->has('firstname'))
                                                <div class="text-red-500 font-semibold my-2">
                                                {{ $errors->first('firstname') }}
                                                </div>
                                            @endif
                                            <input type="text" name="firstname"
                                                placeholder="Prénom" class="w-full">
                                        </td>
                                        <!-- Champ de saisie pour le prénom de l'utilisateur -->
                                        <td class="border px-4 py-2">
                                            @if ($errors->has('lastname'))
                                                <div class="text-red-500 font-semibold my-2">
                                                {{ $errors->first('lastname') }}
                                                </div>
                                            @endif
                                            <input type="text" name="lastname"
                                                placeholder="Nom" class="w-full"></td>
                                        <!-- Champ de saisie pour le nom de l'utilisateur -->
                                        <td class="border px-4 py-2">
                                            @if ($errors->has('email'))
                                                <div class="text-red-500 font-semibold my-2">
                                                {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                            <input type="email" name="email"
                                                placeholder="Email" class="w-full"></td>
                                        <!-- Champ de saisie pour l'adresse email de l'utilisateur -->
                                        <td class="border px-4 py-2">
                                            <select name="roles_id" id="" class="w-full">
                                                <!-- Boucle à travers les rôles de l'utilisateur -->
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    <!-- Option du menu déroulant pour chaque rôle disponible -->
                                                @endforeach
                                            </select>
                                        </td>
                                        <!-- Menu déroulant pour sélectionner le rôle de l'utilisateur -->
                                        <td class="border px-4 py-2">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Ajouter</button>
                                            <!-- Bouton pour ajouter un nouvel utilisateur -->
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
