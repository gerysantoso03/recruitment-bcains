<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\CssSelector\Node\FunctionNode;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "position_name" => fake()->jobTitle(),
            "employment_type" => "Contract",
            "qualifications" => fake()->text(30),
            "end_date" => fake()->date(),
            "branch_id" => function () {
                return Branch::factory()->create()->id;
            },
            "department_id" => function () {
                return Department::factory()->create()->id;
            }
        ];
    }
}
