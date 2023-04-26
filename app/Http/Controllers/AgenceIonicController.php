<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class AgenceIonicController extends Controller
{
    public function index()
    {
        $agences = Agence::all();

        return response()->json([
            'agences' => $agences
        ]);
    }
    public function show($agenceId){
        $agence = Agence::find($agenceId);
        return response()->json([
            'agence' => $agence
        ]);
    }

    public function showCommande($voitureId){
        $vehicule = Vehicule::find($voitureId);
        return response()->json([
            'vehicule' => $vehicule
        ]);
    }
}
