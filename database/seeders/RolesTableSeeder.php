<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
                'created_at' => '2025-09-25 17:57:13',
                'updated_at' => '2025-09-25 17:57:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'house_owner',
                'guard_name' => 'web',
                'created_at' => '2025-09-25 17:57:13',
                'updated_at' => '2025-09-25 17:57:13',
            ),
        ));
        
        
    }
}