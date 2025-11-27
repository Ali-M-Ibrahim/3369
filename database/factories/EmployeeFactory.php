<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{

     protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'salutation'=>fake()->title,
            'name'=>fake()->name(),
            'email'=>fake()->safeEmail(),
            'address'=>fake()->address(),
            'telephone'=>fake()->phoneNumber(),
            'salary'=>fake()->randomFloat(),
            'notes'=>fake()->sentence()
        ];
    }
}
