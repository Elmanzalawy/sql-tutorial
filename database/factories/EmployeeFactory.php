<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'manager_id' => fake()->boolean(90) ? (Employee::count() > 0 ? Employee::inRandomOrder()->first() : Employee::factory()->create()) : null,
            'department_id' => Department::count() > 0 ? Department::inRandomOrder()->first() : Department::factory()->create(),
        ];
    }
}
