<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseur = Fournisseur::all();

        return view('fournisseur/index', [
            'fournisseur' => $fournisseur
        ]);
    }

    public function create()
    {
        return view('fournisseur/create');
    }

    public function store(Request $request)
    {
        $fournisseur = Fournisseur::create([
            'label' => $request->label,
        ]);

        return response()->redirectToRoute('dashboard.fournisseur.index');
    }

    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);

        return view('fournisseur.edit', ['fournisseur' => $fournisseur]);
    }

     public function update(Fournisseur $id, Request $request)
     {

        $validate = $request->validate([
            'label' => 'string',
        ]);

        $id->update([
            'label' => $validate['label'],
        ]);

        return response()->redirectToRoute('dashboard.fournisseur.index');
     }

     public function delete($id)
    {
        $fournisseur = Fournisseur::findOrFail($id);
        $fournisseur->delete();

        return response()->redirectToRoute('dashboard.fournisseur.index')->with('success', 'Voiture supprimer avec succèss');
     }
}
