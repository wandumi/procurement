<?php

use Illuminate\Database\Seeder;

class pcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pcategories')->insert([
            'name' => 'Up to R2000 :1 Quotation',
            'description' => 'administrator of the site', 
        ]);

        DB::table('pcategories')->insert([
            'name' => 'R2000-R10000:3 Verbal Quotations',
            'description' => 'User of the site', 
        ]);

        DB::table('pcategories')->insert([
            'name' => 'R10000-R30000:3 Written Quotations',
            'description' => 'User of the site', 
        ]);

        DB::table('pcategories')->insert([
            'name' => 'R30000-R50000:3 Written Quotations 80:20',
            'description' => 'User of the site', 
        ]);

        DB::table('pcategories')->insert([
            'name' => 'R500,001-R1,000,000: Tenders 80:20',
            'description' => 'User of the site', 
        ]);

        DB::table('pcategories')->insert([
            'name' => 'R1,000,000 -> Tenders 90:20',
            'description' => 'User of the site', 
        ]);
    }
}
