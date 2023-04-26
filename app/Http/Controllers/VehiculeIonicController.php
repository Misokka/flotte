<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeIonicController extends Controller
{
    public function index($agenceId)
    {
        $voitures = Vehicule::where('agence_id', $agenceId)->where('status_id',1)->get();

        return response()->json([
            'voitures' => $voitures
        ]);
    }

    public function show($voitureId)
    {
        $voiture = Vehicule::findOrFail($voitureId);

        return response()->json([
            'voiture' => $voiture
        ]);
    }
}

?>
