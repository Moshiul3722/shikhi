<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->sentence(rand(2, 5));
        $type = ['active', 'inactive'];
        return [
            'name'      => $name,
            'slug'      => Str   ::slug($name),
            'content'   => fake()->paragraph(rand(1, 3), true),
            'status'    => $type[rand(0, 1)],
            'course_id' => Course::all()->random()->id,
            'positions' => 0,
        ];
    }
}
