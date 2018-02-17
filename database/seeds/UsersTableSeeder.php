<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->email = 'factufaciladmin@mailinator.com';
        $user->password = 'pruebas';
        $user->save();
    }
}
