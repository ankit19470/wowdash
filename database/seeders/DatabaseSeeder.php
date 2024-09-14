<?php

namespace Database\Seeders;

use App\Models\User;
// use Spatie\Permission\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
// class PermissionSeeder extends Seeder
// {
//     public function run()
//     {
//         Permission::create(['name' => 'view user']);
//         Permission::create(['name' => 'edit user']);
//         // Add more permissions as needed
//     }
// }
