<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "username" => "oplet",
            "phone_number" => '085490323453',
            "email" => "oplet@gmail.com",
            "password" => bcrypt("oplettua"),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
    }
}
