<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
      
        $this->call([
            RolePermissionSeeder::class
        ]);

        $this->call([
            StudentSeeder::class,
        ]);
        $this->call([
            SettingsTableSeeder::class,
        ]);
          $user1 = User::create([
            'name' => 'Manager One',
            'email' => 'manager1@example.com',
            'password' => Hash::make('11111111'),
        ]);

        $user1->assignRole('manger');

        $user2 = User::create([
            'name' => 'Manager Two',
            'email' => 'manager2@example.com',
            'password' => Hash::make('11111111'),
        ]);

        $user2->assignRole('manger');
    }
}
