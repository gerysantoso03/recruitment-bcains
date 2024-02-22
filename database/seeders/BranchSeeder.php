<?php

namespace Database\Seeders;

use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::factory()->count(8)->create();
        // DB::table('branches')->insert([
        //     [
        //         "branch_name" => 'WTC Mangga Dua',
        //         "branch_location" => "ITC Mangga Dua, Jakarta Pusat",
        //         "branch_head" => "Calvin",
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "branch_name" => 'Bekasi',
        //         "branch_location" => "ITC Mangga Dua, Jakarta Pusat",
        //         "branch_head" => "Darwin Tjoa",
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "branch_name" => 'Tangerang',
        //         "branch_location" => "Ruko bolsena, Gading Serpong",
        //         "branch_head" => "Rika",
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "branch_name" => 'Veteran Jakarta',
        //         "branch_location" => "Veteran, Bintaro",
        //         "branch_head" => "Adit",
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "branch_name" => 'Kantor Pusat',
        //         "branch_location" => "Sahid Sudirman Center, Jakarta Pusat",
        //         "branch_head" => "",
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);
    }
}
