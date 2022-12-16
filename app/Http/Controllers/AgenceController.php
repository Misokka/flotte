<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;

class AgenceController extends Controller
{
    public function index()
    {
        $agence = Agence::all();

        return view('agence/index', [
            'agences' => $agence
        ]);
    }

    public function create()
    {
        return view('agence/create');
    }

    public function store(Request $request)
    {
        $agence = new Agence();
        $agence->label = $request->label;
        $agence->save();

        return response()->redirectToRoute('dashboard.agence.index');
    }

    public function edit($id)
    {
        $agence = Agence::find($id);

        return view('agence.edit', ['agence' => $agence]);
    }

     public function update(Agence $id, Request $request)
     {

        $validate = $request->validate([
            'label' => 'string',
        ]);

        $id->update([
            'label' => $validate['label'],
        ]);

        return response()->redirectToRoute('dashboard.agence.index');
     }

     public function delete($id)
    {
        $agence = Agence::findOrFail($id);
        $agence->delete();

        return response()->redirectToRoute('dashboard.agence.index')->with('success', 'Voiture supprimer avec succèss');
     }
}
