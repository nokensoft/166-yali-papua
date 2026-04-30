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

        User::create([
            'name' => 'Harun H.',
            'email' => 'harun.h@yalipapua.org',
            'password' => 'Y4L1_2026',
            'role' => 'penulis',
        ]);

        User::create([
            'name' => 'Nees M.',
            'email' => 'nees.m@yalipapua.org',
            'password' => 'Y4L1_2026',
            'role' => 'penulis',
        ]);
    }
}
