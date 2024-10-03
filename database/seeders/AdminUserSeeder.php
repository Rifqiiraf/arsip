<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cek jika admin sudah ada
        if (User::where('email', 'admin@gmail.com')->doesntExist()) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'admin',
            ]);
        }

        // Cek jika user sudah ada
        if (User::where('email', 'user@gmail.com')->doesntExist()) {
            DB::table('users')->insert([
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 'user',
            ]);
        }
    }
}
