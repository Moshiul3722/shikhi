<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Moshiul',
            'userName' => 'Moshiul',
            'phone' => '01715369865',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
            'status' => 'active',
            'thumbnail' => 'https://random.imagecdn.app/100/100'
        ]);
    }
}
