<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_name' => fake()->company(),
            'department_head' => fake()->name(),
            "division_id" => function () {
                return Division::factory()->create()->id;
            }
        ];
    }
}
