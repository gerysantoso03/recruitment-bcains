<?php

namespace Database\Seeders;

use App\Models\Division;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Division::factory()->count(5)->create();
        // DB::table('divisions')->insert([
        //     [
        //         "division_name" => "Underwriting & Treaty",
        //         "division_head" => 'Eric Sudarji',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "division_name" => "Marketing",
        //         "division_head" => 'Willy',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "division_name" => "Klaim",
        //         "division_head" => 'Kyun',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "division_name" => "HCGA",
        //         "division_head" => 'Iing',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         "division_name" => "Informatika",
        //         "division_head" => 'Benny',
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);
    }
}
