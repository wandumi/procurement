<?php

use Illuminate\Database\Seeder;

class rfqstatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rfqstatuses')->insert([
            'name' => 'Published',
            'description' => 'Suppliers Can apply', 
        ]);

        DB::table('rfqstatuses')->insert([
            'name' => 'Pending',
            'description' => 'Waiting for approval', 
        ]);

        DB::table('rfqstatuses')->insert([
            'name' => 'Draft',
            'description' => 'Manager Creating', 
        ]);

    }
}
