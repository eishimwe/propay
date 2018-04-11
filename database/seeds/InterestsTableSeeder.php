<?php

use Illuminate\Database\Seeder;
use App\Interest;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->truncate();

        $interests = [
            ['name' => 'Sport'],
            ['name' => 'Movies'],
            ['name' => 'Books']
        ];

        foreach ($interests as $interest) {

            Interest::create($interest);
        }
    }
}
