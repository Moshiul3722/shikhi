<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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


        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);

        \App\Models\User::factory()->create([
            'name'              =>  'Gazi Moshiul',
            'userName'          =>  'Moshiul',
            'email'             =>  'test@gmail.com',
            'email_verified_at' =>  now(),
            'image'             =>  'https://random.imagecdn.app/100/100',
            'password'          =>  bcrypt('123')
        ])->assignRole('super-admin');

        // Category
        Category::factory(10)->create();

        // Course
        \App\Models\Course::factory(15)->create();

        // Lesson
        \App\Models\Lesson::factory(15)->create();
    }
}
