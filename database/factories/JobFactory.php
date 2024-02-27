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
        // Get random department and branch id that've been made
        $department = Department::inRandomOrder()->first();
        $branch = Branch::inRandomOrder()->first();
        return [
            "position_name" => fake()->jobTitle(),
            "employment_type" => "Contract",
            "qualifications" => fake()->paragraphs(3, true),
            "end_date" => fake()->dateTimeBetween('now +1 days', '+10 months'),
            "branch_id" => $branch->id,
            "department_id" => $department->id,
        ];
    }
}
