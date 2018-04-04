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
            'cat-name' => 'Witgoed'
        ],
        [
            'cat-name' => 'Electronica'
        ],
        [
            'cat-name' => 'Tuinartikelen'
        ],
        [
            'cat-name' => 'Kleding'
        ],
        [
            'cat-name' => 'Boeken'
        ]);
    }
}
