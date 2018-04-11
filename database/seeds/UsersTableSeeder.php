<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();

        User::create([
            'name'          => 'Admin',
            'email'         => 'admin@propay.co.za',
            'password'      =>  bcrypt('12345'),
        ]);
    }
}
