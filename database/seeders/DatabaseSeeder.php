<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder untuk Site
        $this->call(SiteSeeder::class);

        // Super user
        User::create([
            'name' => 'Admin',
            'email' => 'ncxtimur@gmail.com',
            'password' => bcrypt('Sayasatpol123'),
            'role' => 'super_user',
        ]);


    }
}
