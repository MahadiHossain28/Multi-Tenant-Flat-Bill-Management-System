<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buildings')->delete();
        
        \DB::table('buildings')->insert(array (
            0 => 
            array (
                'id' => 2,
                'house_owner_id' => 3,
                'name' => 'Building A',
                'address' => '1428/1 GAZIPARA, UTTARKHAN, UTTARA, DHAKA',
                'created_at' => '2025-09-25 18:11:14',
                'updated_at' => '2025-09-26 15:59:31',
            ),
            1 => 
            array (
                'id' => 3,
                'house_owner_id' => 4,
                'name' => 'Building B',
                'address' => 'Nulla nesciunt pari',
                'created_at' => '2025-09-25 18:11:46',
                'updated_at' => '2025-09-25 18:11:46',
            ),
            2 => 
            array (
                'id' => 4,
                'house_owner_id' => 5,
                'name' => 'Building C',
                'address' => 'Eveniet sunt nulla',
                'created_at' => '2025-09-26 16:00:00',
                'updated_at' => '2025-09-26 16:00:00',
            ),
        ));
        
        
    }
}