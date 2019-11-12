<?php

use Illuminate\Database\Seeder;

class suppliertypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliertypes')->insert([
            'name' => 'Banking',
            'description' => 'administrator of the site', 
        ]);

        DB::table('suppliertypes')->insert([
            'name' => 'Accounting',
            'description' => 'User of the site', 
        ]);

        DB::table('suppliertypes')->insert([
            'name' => 'Marketing',
            'description' => 'User of the site', 
        ]);

        DB::table('suppliertypes')->insert([
            'name' => 'Insurance',
            'description' => 'User of the site', 
        ]);

        DB::table('suppliertypes')->insert([
            'name' => 'Information Technology',
            'description' => 'User of the site', 
        ]);

        DB::table('suppliertypes')->insert([
            'name' => 'Travel',
            'description' => 'User of the site', 
        ]);

        DB::table('suppliertypes')->insert([
            'name' => 'Stationary',
            'description' => 'User of the site', 
        ]);
    }
}
