<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BillCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bill_categories')->delete();
        
        \DB::table('bill_categories')->insert(array (
            0 => 
            array (
                'id' => 3,
                'building_id' => 2,
                'name' => 'Rent',
                'created_at' => '2025-09-25 21:56:10',
                'updated_at' => '2025-09-26 10:22:04',
            ),
            1 => 
            array (
                'id' => 4,
                'building_id' => 2,
                'name' => 'Electricity',
                'created_at' => '2025-09-26 10:22:22',
                'updated_at' => '2025-09-26 10:23:07',
            ),
            2 => 
            array (
                'id' => 5,
                'building_id' => 2,
                'name' => 'Gas bill',
                'created_at' => '2025-09-26 10:23:16',
                'updated_at' => '2025-09-26 10:23:16',
            ),
            3 => 
            array (
                'id' => 6,
                'building_id' => 2,
                'name' => 'Water bill',
                'created_at' => '2025-09-26 10:23:25',
                'updated_at' => '2025-09-26 10:23:25',
            ),
            4 => 
            array (
                'id' => 7,
                'building_id' => 2,
                'name' => 'Utility Charges',
                'created_at' => '2025-09-26 10:23:34',
                'updated_at' => '2025-09-26 10:23:34',
            ),
            5 => 
            array (
                'id' => 8,
                'building_id' => 3,
                'name' => 'Rent',
                'created_at' => '2025-09-26 16:03:33',
                'updated_at' => '2025-09-26 16:03:33',
            ),
            6 => 
            array (
                'id' => 9,
                'building_id' => 3,
                'name' => 'Electricity',
                'created_at' => '2025-09-26 16:03:47',
                'updated_at' => '2025-09-26 16:03:47',
            ),
            7 => 
            array (
                'id' => 10,
                'building_id' => 3,
                'name' => 'Gas bill',
                'created_at' => '2025-09-26 16:03:59',
                'updated_at' => '2025-09-26 16:03:59',
            ),
            8 => 
            array (
                'id' => 11,
                'building_id' => 3,
                'name' => 'Water bill',
                'created_at' => '2025-09-26 16:04:11',
                'updated_at' => '2025-09-26 16:04:11',
            ),
            9 => 
            array (
                'id' => 12,
                'building_id' => 3,
                'name' => 'Utility Charges',
                'created_at' => '2025-09-26 16:04:21',
                'updated_at' => '2025-09-26 16:04:21',
            ),
        ));
        
        
    }
}