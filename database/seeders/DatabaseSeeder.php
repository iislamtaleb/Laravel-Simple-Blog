<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $adminUser = User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'password' => bcrypt('islamislam'),
         ]);

         $adminRole = Role::create(['name'=>'admin']);

         $adminUser->assignRole($adminRole);
    }
}
