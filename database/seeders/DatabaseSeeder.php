<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Memanggil seeder yang lain
        $this->call(AdminUserSeeder::class); // Tambahkan ini untuk memanggil seeder
    }
}

