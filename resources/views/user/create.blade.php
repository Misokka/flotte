<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
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
                    <form action="{{ route('dashboard.user.store') }}" method="post">
                        @csrf
                        <input type="text" name="lastname" placeholder="Nom">
                        <input type="text" name="firstname" placeholder="Prénom">
                        <input type="email" name="email" placeholder="Email">
                        <input type="text" name="password" placeholder="Mot de passe">
                        <input type="text" name="role_id" placeholder="Rôle">
                        <input type="submit" value="Valider">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
