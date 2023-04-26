<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i ++) {
            $random = random_int(1, 6);

            $users = new User();
            $users->lastname = "Jeremy";
            $users->firstname = "$i . Caron";
            $users->email = $i . "jeremy@gmail.com";
            $users->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";
            $users->remember_token = Str::random(10);
            $users->roles_id = $random;
            $users->save();
        }
    }
}
