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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{ route('dashboard.agence.update', ['id' => $agence->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="text" name="label" placeholder="Nom" value="{{ $agence->label }}">
                        <button type="submit">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
