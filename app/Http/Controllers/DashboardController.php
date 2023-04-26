<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Sélectionner la date de création de chaque commande et le nombre total de commandes créées ce jour-là, puis les grouper par jour
        $commandes = DB::table('commande')
            ->select(DB::raw('DATE(created_at) as day'), DB::raw('COUNT(*) as count'))
            ->groupBy('day')
            ->get();

        // Extraire les dates des commandes pour les utiliser sur l'axe X du graphique
        $jours = $commandes->pluck('day')->toArray();
        // Extraire le nombre total de commandes pour chaque date et le convertir en tableau d'entiers pour les utiliser sur l'axe Y du graphique
        $data = $commandes->pluck('count', 'day')->map(function ($item) {
            return (int) $item;
        })->toArray();

        // Passer les tableaux de dates et de données à la vue
        return view('dashboard', compact('jours', 'data'));
    }
}
