<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateProductsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Kaas',
            'description' => 'Dit is een lekker stukkie kaas',
            'price' => 12,
            'discount' => 10,
            'image_url' => 'noimage.jpg',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
