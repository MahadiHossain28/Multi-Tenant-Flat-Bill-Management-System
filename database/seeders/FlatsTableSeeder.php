<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FlatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('flats')->delete();
        
        \DB::table('flats')->insert(array (
            0 => 
            array (
                'id' => 1,
                'house_owner_id' => 3,
                'building_id' => 2,
                'number' => '101',
                'owner_name' => 'Mahadi',
                'owner_contact' => '01999999999',
                'owner_email' => 'bevivivul@mailinator.com',
                'created_at' => '2025-09-25 18:13:20',
                'updated_at' => '2025-09-25 18:13:20',
            ),
            1 => 
            array (
                'id' => 2,
                'house_owner_id' => 4,
                'building_id' => 3,
                'number' => 'Nathaniel Duffy',
                'owner_name' => 'Xandra Underwood',
                'owner_contact' => 'Ullamco fuga Accusa',
                'owner_email' => 'boketus@mailinator.com',
                'created_at' => '2025-09-25 18:13:41',
                'updated_at' => '2025-09-25 18:13:41',
            ),
            2 => 
            array (
                'id' => 3,
                'house_owner_id' => 4,
                'building_id' => 3,
                'number' => 'Margaret Reynolds',
                'owner_name' => 'Andrew Whitehead',
                'owner_contact' => 'Fugit aut sint veli',
                'owner_email' => 'deravaqalu@mailinator.com',
                'created_at' => '2025-09-25 18:13:51',
                'updated_at' => '2025-09-25 18:13:51',
            ),
            3 => 
            array (
                'id' => 4,
                'house_owner_id' => 3,
                'building_id' => 2,
                'number' => 'Sierra',
                'owner_name' => 'Jesse Robertson',
                'owner_contact' => 'Non quis asperiores',
                'owner_email' => 'tesocyli@mailinator.com',
                'created_at' => '2025-09-25 18:20:33',
                'updated_at' => '2025-09-25 18:20:44',
            ),
            4 => 
            array (
                'id' => 6,
                'house_owner_id' => 4,
                'building_id' => 3,
                'number' => 'Palmer Juarez',
                'owner_name' => 'Skyler Castaneda',
                'owner_contact' => 'Quibusdam corrupti',
                'owner_email' => 'bujez@mailinator.com',
                'created_at' => '2025-09-25 18:21:49',
                'updated_at' => '2025-09-25 18:21:49',
            ),
            5 => 
            array (
                'id' => 7,
                'house_owner_id' => 3,
                'building_id' => 2,
                'number' => '266',
                'owner_name' => 'Kyra Singleton',
                'owner_contact' => '01999999991',
                'owner_email' => 'zazetig@mailinator.com',
                'created_at' => '2025-09-25 20:56:12',
                'updated_at' => '2025-09-25 20:56:12',
            ),
            6 => 
            array (
                'id' => 8,
                'house_owner_id' => 5,
                'building_id' => 4,
                'number' => '101',
                'owner_name' => 'Tamekah Puckett',
                'owner_contact' => '01778765645',
                'owner_email' => 'joqo@mailinator.com',
                'created_at' => '2025-09-26 16:06:50',
                'updated_at' => '2025-09-26 16:06:50',
            ),
        ));
        
        
    }
}