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
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="{{ route('dashboard.vehicule.update', ['id' => $vehicule->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" name="model" placeholder="Model" value="{{ $vehicule->model }}">
                        <input type="text" name="marque" placeholder="Marque" value="{{ $vehicule->marque }}">
                        <input type="date" name="last_maintenance" placeholder="Dernière réparation" value="{{ \Carbon\Carbon::parse($vehicule->last_maintenance)->format('Y-m-d') }}">
                        <input type="text" name="nb_kilometrage" placeholder="Nombre de kilometre" value="{{ $vehicule->nb_kilometrage }}">
                        <input type="text" name="nb_serie" placeholder="Numéro de série" value="{{ $vehicule->nb_serie }}">
                        <button type="submit">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
