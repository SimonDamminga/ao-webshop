<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Simon Damminga',
            'email' => 'simon.damminga@gmail.com',
            'password' => Hash::make('123456'),
            'is_admin' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
