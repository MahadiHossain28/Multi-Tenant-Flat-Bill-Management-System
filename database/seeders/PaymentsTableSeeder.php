<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('payments')->delete();
        
        \DB::table('payments')->insert(array (
            0 => 
            array (
                'id' => 6,
                'bill_id' => 1,
                'paid_by_tenant_id' => 1,
                'amount' => '12000.00',
                'paid_at' => '2025-09-26 13:20:49',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 13:20:49',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            1 => 
            array (
                'id' => 7,
                'bill_id' => 2,
                'paid_by_tenant_id' => 1,
                'amount' => '100.00',
                'paid_at' => '2025-09-26 13:20:49',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 13:20:49',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            2 => 
            array (
                'id' => 8,
                'bill_id' => 3,
                'paid_by_tenant_id' => 1,
                'amount' => '300.00',
                'paid_at' => '2025-09-26 13:20:49',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 13:20:49',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            3 => 
            array (
                'id' => 9,
                'bill_id' => 4,
                'paid_by_tenant_id' => 1,
                'amount' => '150.00',
                'paid_at' => '2025-09-26 13:20:49',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 13:20:49',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            4 => 
            array (
                'id' => 10,
                'bill_id' => 5,
                'paid_by_tenant_id' => 1,
                'amount' => '1200.00',
                'paid_at' => '2025-09-26 13:20:49',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 13:20:49',
                'updated_at' => '2025-09-26 13:20:49',
            ),
            5 => 
            array (
                'id' => 11,
                'bill_id' => 2,
                'paid_by_tenant_id' => 1,
                'amount' => '100.00',
                'paid_at' => '2025-09-26 13:28:03',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 13:28:03',
                'updated_at' => '2025-09-26 13:28:03',
            ),
            6 => 
            array (
                'id' => 12,
                'bill_id' => 41,
                'paid_by_tenant_id' => 1,
                'amount' => '12000.00',
                'paid_at' => '2025-09-26 14:53:11',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 14:53:11',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            7 => 
            array (
                'id' => 13,
                'bill_id' => 42,
                'paid_by_tenant_id' => 1,
                'amount' => '700.00',
                'paid_at' => '2025-09-26 14:53:11',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 14:53:11',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            8 => 
            array (
                'id' => 14,
                'bill_id' => 43,
                'paid_by_tenant_id' => 1,
                'amount' => '300.00',
                'paid_at' => '2025-09-26 14:53:11',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 14:53:11',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            9 => 
            array (
                'id' => 15,
                'bill_id' => 44,
                'paid_by_tenant_id' => 1,
                'amount' => '150.00',
                'paid_at' => '2025-09-26 14:53:11',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 14:53:11',
                'updated_at' => '2025-09-26 14:53:11',
            ),
            10 => 
            array (
                'id' => 16,
                'bill_id' => 45,
                'paid_by_tenant_id' => 1,
                'amount' => '1200.00',
                'paid_at' => '2025-09-26 14:53:11',
                'payment_method' => 'cash',
                'created_at' => '2025-09-26 14:53:11',
                'updated_at' => '2025-09-26 14:53:11',
            ),
        ));
        
        
    }
}