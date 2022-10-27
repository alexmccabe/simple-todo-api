<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => uniqid(rand()),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'project_id' => null,
            'user_id' => User::factory(),
        ];
    }
}
