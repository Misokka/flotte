<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FlexiFleet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center items-center">
                <h2 class="text-2xl font-bold">Bienvenue sur ce site, l'outil idéal pour une gestion simplifiée de votre
                    flotte de véhicules.</h2>
            </div>
            </br>
            </br>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');
        const jours = {!! json_encode($jours) !!};
        const data = {!! json_encode($data) !!};

        // Créer un objet qui associe chaque jour de la semaine (1-7) à un nom de jour
        const joursDeLaSemaine = {
        };

        // Convertir les dates des commandes en jours de la semaine (1-7)
        const joursCommandes = jours.map(jour => new Date(jour).getDay());

        // Créer un objet de données avec une clé pour chaque jour de la semaine (1-7)
        const donnees = {
            1: 0,
            2: 0,
            3: 0,
            4: 0,
            5: 0,
            6: 0,
            7: 0,
        };

        // Remplir l'objet de données avec le nombre de commandes pour chaque jour de la semaine
        joursCommandes.forEach(jourCommande => {
            if (donnees[jourCommande] == null) {
                donnees[jourCommande] = 1;
            } else {
                donnees[jourCommande] += 1;
            }
        });

        // Créer une liste d'étiquettes pour les jours de la semaine
        const etiquettes = Object.values(joursDeLaSemaine);

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquettes,
                datasets: [{
                    label: 'Nombre de commandes par jour',
                    data: data,
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMax: Math.max(...Object.values(donnees)) + 1
                        }
                    }]
                }
            }
        });
    </script>







    {{-- <script>
    const ctx = document.getElementById('myChart');
    const jours = {!! json_encode($jours) !!};
    const data = {!! json_encode($data) !!};

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data,
            labels: jours,
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{
                label: 'Nombre de commandes par jour',
                data: data,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
        }
    });
</script> --}}

</x-app-layout>
