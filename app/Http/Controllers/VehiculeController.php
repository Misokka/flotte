<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicule = Vehicule::all();

        return view('vehicule/index', [
            'vehicule' => $vehicule
        ]);
    }

    public function create()
    {
        return view('vehicule/create');
    }

    public function store(Request $request)
    {
        $vehicule = Vehicule::create([
            'model' => $request->model,
            'marque' => $request->marque,
            'last_maintenance' => $request->last_maintenance,
            'nb_kilometrage' => $request->nb_kilometrage,
            'nb_serie' => $request->nb_serie,
            'status_id' => Status::where('label', 'Libre')->first()->id
        ]);

        return response()->redirectToRoute('dashboard.vehicule.index');
    }

    public function edit($id)
    {
        $vehicule = Vehicule::find($id);

        return view('vehicule.edit', ['vehicule' => $vehicule]);
     }

     public function update(Vehicule $id, Request $request)
     {

        $validate = $request->validate([
            'model' => 'string',
            'marque' => 'string',
            'last_maintenance' => 'date',
            'nb_kilometrage' => 'string',
            'nb_serie' => 'string',
        ]);

        $id->update([
            'model' => $validate['model'],
            'marque' => $validate['marque'],
            'last_maintenance' => $validate['last_maintenance'],
            'nb_kilometrage' => $validate['nb_kilometrage'],
            'nb_serie' => $validate['nb_serie'],
        ]);

        return response()->redirectToRoute('dashboard.vehicule.index');
     }

     public function delete($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();


        return response()->redirectToRoute('dashboard.vehicule.index');
     }
}
