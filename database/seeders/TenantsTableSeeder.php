<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tenants')->delete();
        
        \DB::table('tenants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Raw',
                'email' => 'hello@speedybites.uk',
                'contact' => '12345678910',
                'assigned_house_owner_id' => 3,
                'assigned_building_id' => 2,
                'assigned_flat_id' => 1,
                'created_at' => '2025-09-25 20:03:02',
                'updated_at' => '2025-09-26 16:06:07',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Gillian Salinas',
                'email' => 'pewajanep@mailinator.com',
                'contact' => '01938984203',
                'assigned_house_owner_id' => 3,
                'assigned_building_id' => 2,
                'assigned_flat_id' => 4,
                'created_at' => '2025-09-25 20:03:48',
                'updated_at' => '2025-09-26 16:05:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Fuller England',
                'email' => 'jatoqade@mailinator.com',
                'contact' => '01111111111',
                'assigned_house_owner_id' => 3,
                'assigned_building_id' => 2,
                'assigned_flat_id' => 7,
                'created_at' => '2025-09-26 16:05:47',
                'updated_at' => '2025-09-26 16:06:14',
            ),
        ));
        
        
    }
}