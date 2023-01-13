<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Roles();
        $admin->label = "Admin";
        $admin->save();

        $rh = new Roles();
        $rh->label = "RH";
        $rh->save();

        $chef = new Roles();
        $chef->label = "ChefAgence";
        $chef->save();

        $gestAgences = new Roles();
        $gestAgences->label = "GestionnaireAgences";
        $gestAgences->save();

        $gestFournisseurs = new Roles();
        $gestFournisseurs->label = "GestionnaireFournisseurs";
        $gestFournisseurs->save();

        $gestCommandes = new Roles();
        $gestCommandes->label = "GestionnaireCommandes";
        $gestCommandes->save();
    }
}
