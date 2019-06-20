<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $u = new User();
            $u->name = "admin";
            $u->role = 'provider';
            $u->password = bcrypt('qwertyuiop');
            $u->save();

    }
}
