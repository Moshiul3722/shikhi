<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name'              =>  'Gazi Moshiul',
            'userName'          =>  'Moshiul',
            'email'             =>  'test@gmail.com',
            'email_verified_at' =>  now(),
            'image'             =>  'https://random.imagecdn.app/100/100',
            'password'          =>  bcrypt('123')
        ]);
    }
}
