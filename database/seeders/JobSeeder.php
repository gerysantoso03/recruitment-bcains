<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Division;
use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Job::factory()->count(5)->create();
        // DB::table('jobs')->insert([
        //     [
        //         'position_name' => "Marketing Cabang",
        //         'employment_type' => "Full-Time",
        //         'qualifications' => "City Lead Lampung will lead projects, strategies, and operations for Transport & Delivery Lampung Area. We believe a successful candidate has the skill of data analysis, strategic thinking, and project management, but if you believe you have what it takes then we'd love to hear from you either way",
        //         "end_date" => '2024-12-31',
        //         "branch_id" => 1,
        //         "department_id" => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'position_name' => "Frontend Developer",
        //         'employment_type' => "Contract",
        //         'qualifications' => "City Lead Lampung will lead projects, strategies, and operations for Transport & Delivery Lampung Area. We believe a successful candidate has the skill of data analysis, strategic thinking, and project management, but if you believe you have what it takes then we'd love to hear from you either way",
        //         "end_date" => '2024-12-31',
        //         "branch_id" => 3,
        //         "department_id" => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'position_name' => "Akseptasi Digital",
        //         'employment_type' => "Full-Time",
        //         'qualifications' => "City Lead Lampung will lead projects, strategies, and operations for Transport & Delivery Lampung Area. We believe a successful candidate has the skill of data analysis, strategic thinking, and project management, but if you believe you have what it takes then we'd love to hear from you either way",
        //         "end_date" => '2024-12-31',
        //         "branch_id" => 5,
        //         "department_id" => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);
    }
}
