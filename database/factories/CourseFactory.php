<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $type = ['active', 'inactive'];
        return [
            'name'         => $name,
            'slug'         => Str::slug($name),
            'description'  => $this->faker->sentence(rand(5, 10)),
            'requirements' => $this->faker->sentence(rand(5, 10)),
            'audience'     => $this->faker->name(),
            'status'       => $type[rand(0, 1)],
            'category_id'  => Category::all()->random()->id,
            'teacher_id'   => User::all()->random()->id,
            'thumbnail'    => 'https://source.unsplash.com/random/400x250?men,women&' . rand(2, 24345),
        ];
    }
}
