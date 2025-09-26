<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'phone' => '01111111111',
                'email_verified_at' => NULL,
                'password' => '$2y$12$TeeOg2Sy1lxTYpV7MqDSueYvSN0T5Wx17NVsO8ftAwJlWYIMS8UWq',
                'remember_token' => NULL,
                'created_at' => '2025-09-25 17:57:13',
                'updated_at' => '2025-09-25 17:57:13',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Test 1',
                'email' => 'test@test.com',
                'phone' => '01777074302',
                'email_verified_at' => NULL,
                'password' => '$2y$12$lFf8HOuhbBsGox.MoaN4X.RZrG/0cJ59hebuVMqcnwRpHuD8CPLpG',
                'remember_token' => NULL,
                'created_at' => '2025-09-25 18:11:14',
                'updated_at' => '2025-09-26 15:59:31',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Kuame Frank',
                'email' => 'sykuwovo@mailinator.com',
                'phone' => '01777074303',
                'email_verified_at' => NULL,
                'password' => '$2y$12$h8x8PiVNtWBXOktFP82MPeDLOO9qLZ8oEGoiXU.A5c7k81Coihca.',
                'remember_token' => NULL,
                'created_at' => '2025-09-25 18:11:46',
                'updated_at' => '2025-09-25 18:11:46',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Breanna Barr',
                'email' => 'vobutix@mailinator.com',
                'phone' => '01922952081',
                'email_verified_at' => NULL,
                'password' => '$2y$12$BSYXjF4sjd/7o.hocedGGObGYd/paRLHl9c4pZLRNS0JBfFxUYq1q',
                'remember_token' => NULL,
                'created_at' => '2025-09-26 16:00:00',
                'updated_at' => '2025-09-26 16:00:00',
            ),
        ));
        
        
    }
}