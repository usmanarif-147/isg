<?php

namespace Database\Seeders\Admin;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'password' => bcrypt('11223344'),
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
