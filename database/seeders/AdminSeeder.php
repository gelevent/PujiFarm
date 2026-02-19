<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada, jika belum maka buat baru
        if (!User::where('email', 'admin@test.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('password'), // Password default: 'password'
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('✅ Admin user created successfully!');
        $this->command->info('📧 Email: admin@test.com');
        $this->command->info('🔑 Password: password');
    }
}