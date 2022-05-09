<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Status();
        $admin->label = "Libre";
        $admin->save();

        $moderator = new Status();
        $moderator->label = "Reparation";
        $moderator->save();

        $member = new Status();
        $member->label = "Indisponible";
        $member->save();
    }
}
