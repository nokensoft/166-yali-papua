<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@yalipapua.org',
            'password' => 'admin@yalipapua.org',
            'role' => 'admin_master',
        ]);

        User::create([
            'name' => 'Penulis YALI',
            'email' => 'penulis@yalipapua.org',
            'password' => 'penulis@yalipapua.org',
            'role' => 'penulis',
        ]);
    }
}
