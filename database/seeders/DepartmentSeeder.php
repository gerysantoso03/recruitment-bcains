<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['department_name' => 'Human Capital'],
            ['department_name' => 'General Affair'],
            ['department_name' => 'IT & Infrastructure'],
            ['department_name' => 'Keuangan'],
            ['department_name' => 'Underwriting & Treaty'],
            ['department_name' => 'Marketing Digital'],
            ['department_name' => 'Pengembagan & Strategi Bisnis']
        ]);
    }
}
