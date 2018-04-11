<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->truncate();

        $languages = [
            ['name' => 'English','code' => 'EN'],
            ['name' => 'IsiZulu','code'=>'Zulu'],
            ['name' => 'IsiXhosa','code' => 'Xhosa']
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }


}
