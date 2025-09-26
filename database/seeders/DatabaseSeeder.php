<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(RolePermissionSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(BuildingsTableSeeder::class);
        $this->call(FlatsTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
        $this->call(BillCategoriesTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
    }
}
