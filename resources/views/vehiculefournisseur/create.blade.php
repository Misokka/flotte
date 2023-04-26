<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <form action="{{ route('dashboard.vehiculefournisseur.store') }}" method="post">
                @csrf
                <div class="overflow-x-auto">
                  <table class="table-auto w-full">
                    <thead>
                      <tr class="bg-gray-100">
                        <th class="px-4 py-2 text-left">Marque</th>
                        <th class="px-4 py-2 text-left">Modèle</th>
                        <th class="px-4 py-2 text-left">Dernière maintenance</th>
                        <th class="px-4 py-2 text-left">Nombre de kilomètres</th>
                        <th class="px-4 py-2 text-left">Numéro de série</th>
                        <th class="px-4 py-2 text-center">Statut</th>
                        <th class="px-4 py-2 text-left">Fournisseur</th>
                        <th class="px-4 py-2 text-left">Agence</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="border px-4 py-2"><input type="text" name="marque" placeholder="Marque" class="w-full"></td>
                        <td class="border px-4 py-2"><input type="text" name="model" placeholder="Modèle" class="w-full"></td>
                        <td class="border px-4 py-2"><input type="date" name="last_maintenance" class="w-full"></td>
                        <td class="border px-4 py-2"><input type="text" name="nb_kilometrage" placeholder="kilomètres" class="w-full"></td>
                        <td class="border px-4 py-2"><input type="text" name="nb_serie" placeholder="N° de série" class="w-full"></td>
                        <td class="border px-4 py-2">
                            <select name="status_id" class="w-full">
                              @foreach ($status as $statu)
                                <option value="{{ $statu->id }}">{{ $statu->label }}</option>
                              @endforeach
                            </select>
                          </td>
                        <td class="border px-4 py-2">
                          <select name="fournisseur_id" class="w-full">
                            @foreach ($fournisseur as $fournisseur)
                              <option value="{{ $fournisseur->id }}">{{ $fournisseur->label }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td class="border px-4 py-2">
                          <select name="agence_id" class="w-full">
                            @foreach ($agence as $agence)
                              <option value="{{ $agence->id }}">{{ $agence->label }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td class="border px-4 py-2">
                          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Ajouter</button>
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
