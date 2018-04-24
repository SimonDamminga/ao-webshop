<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Witgoed'
        ]);
        DB::table('categories')->insert([
            'name' => 'Electronica'
        ]);
        DB::table('categories')->insert([
            'name' => 'Boeken'
        ]);
        DB::table('categories')->insert([
            'name' => 'Voedsel'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kleding'
        ]);
    }
}
