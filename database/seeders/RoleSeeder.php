<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
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

        $moderator = new Roles();
        $moderator->label = "Moderator";
        $moderator->save();

        $member = new Roles();
        $member->label = "Member";
        $member->save();
    }
}
