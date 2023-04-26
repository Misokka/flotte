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
        $admin->name = "Admin";
        $admin->guard_name = "Admin";
        $admin->save();

        $rh = new Roles();
        $rh->name = "RH";
        $rh->guard_name = "RH";
        $rh->save();

        $chef = new Roles();
        $chef->name = "Chef_d_Agence";
        $chef->guard_name = "Chef_d_Agence";
        $chef->save();

        $gestAgences = new Roles();
        $gestAgences->name = "Gestionnaire_d_Agences";
        $gestAgences->guard_name = "Gestionnaire_d_Agences";
        $gestAgences->save();

        $gestFournisseurs = new Roles();
        $gestFournisseurs->name = "Gestionnaire Fournisseurs";
        $gestFournisseurs->guard_name = "Gestionnaire Fournisseurs";
        $gestFournisseurs->save();

        $gestCommandes = new Roles();
        $gestCommandes->name = "Gestionnaire Commandes";
        $gestCommandes->guard_name = "Gestionnaire Commandes";
        $gestCommandes->save();
    }
}
