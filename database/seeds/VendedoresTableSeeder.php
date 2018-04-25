<?php

use Illuminate\Database\Seeder;

class VendedoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendedores')->insert([
            'name' => 'vendedor',
            'email' => 'vendedor@gmail.com',
            'password' => bcrypt('vendedor'),
        ]);
    }
}
