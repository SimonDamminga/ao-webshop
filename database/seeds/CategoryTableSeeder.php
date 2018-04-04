<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * We are going to insert 100 categories.
         */
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('categories')->insert([
                'name' => implode($faker->words(),' '),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
