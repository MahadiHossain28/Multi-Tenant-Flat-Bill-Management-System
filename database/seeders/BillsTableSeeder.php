<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bills')->delete();
        
        \DB::table('bills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 3,
                'month' => '2025-08-01',
                'amount' => '12000.00',
                'status' => 'paid',
                'notes' => 'Hello',
                'created_by' => 3,
                'created_at' => '2025-09-26 12:02:27',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            1 => 
            array (
                'id' => 2,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 4,
                'month' => '2025-08-01',
                'amount' => '500.00',
                'status' => 'unpaid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 12:02:27',
                'updated_at' => '2025-09-26 12:02:27',
            ),
            2 => 
            array (
                'id' => 3,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 5,
                'month' => '2025-08-01',
                'amount' => '300.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 12:02:27',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            3 => 
            array (
                'id' => 4,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 6,
                'month' => '2025-08-01',
                'amount' => '150.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 12:02:27',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            4 => 
            array (
                'id' => 5,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 7,
                'month' => '2025-08-01',
                'amount' => '1200.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 12:02:27',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            5 => 
            array (
                'id' => 41,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 3,
                'month' => '2025-09-01',
                'amount' => '12000.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 14:45:33',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            6 => 
            array (
                'id' => 42,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 4,
                'month' => '2025-09-01',
                'amount' => '800.00',
                'status' => 'unpaid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 14:45:33',
                'updated_at' => '2025-09-26 14:45:33',
            ),
            7 => 
            array (
                'id' => 43,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 5,
                'month' => '2025-09-01',
                'amount' => '300.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 14:45:33',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            8 => 
            array (
                'id' => 44,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 6,
                'month' => '2025-09-01',
                'amount' => '150.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 14:45:33',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            9 => 
            array (
                'id' => 45,
                'building_id' => 2,
                'flat_id' => 1,
                'category_id' => 7,
                'month' => '2025-09-01',
                'amount' => '1200.00',
                'status' => 'paid',
                'notes' => NULL,
                'created_by' => 3,
                'created_at' => '2025-09-26 14:45:33',
                'updated_at' => '2025-09-26 14:53:11',
            ),
        ));
        
        
    }
}