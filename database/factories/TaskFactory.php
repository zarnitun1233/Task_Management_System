<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => rand(1, 6),
            'assigned_by_user_id' => rand(1, 6),
            'task_prioritization' => rand(0, 1),
            'due_date' => now(),
            'status' => rand(0, 2),
        ];
    }
}
