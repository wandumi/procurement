<?php

use Illuminate\Database\Seeder;

class requesttypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requesttypes')->insert([
            'name' => 'Request for Proposal(RFP)',
            'description' => 'administrator of the site', 
        ]);

        DB::table('requesttypes')->insert([
            'name' => 'Request for Information(RF)',
            'description' => 'User of the site', 
        ]);

        DB::table('requesttypes')->insert([
            'name' => 'Request for Qualification(RFQ)',
            'description' => 'User of the site', 
        ]);

        DB::table('requesttypes')->insert([
            'name' => 'Request for Tender(RFT)',
            'description' => 'User of the site', 
        ]);

     
    }
}
