<?php

namespace Database\Seeders;

use App\Models\Department;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobs')->insert([
            [
                'department_id' => 1,
                'job_name' => 'Recruiter',
                'job_role' => 'Menerima telfon dari kandidat yang akan masuk ke bca insurance', 'job_qualification' => 'menerima telfon,memberikan masukan berupa data,analisa resume',
                'job_activities' => 'melakukan penerimaan telepon,menerima email masuk,memfilter data pendaftar baru yang baru masuk',
                'valid_end' => '2024-12-31',
                'location' => 'Jakarta',
                'working_type' => 'Fulltime'
            ],
            [
                'department_id' => 2,
                'job_name' => 'Backend Developer',
                'job_role' => 'Membuat service dan fungsi untuk membentuk sistem bca insurance', 'job_qualification' => 'pernah bekerja sebagai backend selama 5 tahun,pernah bekerja sebagai team lead,memiliki pengetahuan dibidang mysql',
                'job_activities' => 'mmebuat fungsi,membuat skema database,membuat service',
                'valid_end' => '2024-12-31',
                'location' => 'Jakarta',
                'working_type' => 'Kontrak'
            ],
            [
                'department_id' => 3,
                'job_name' => 'Underwriter',
                'job_role' => 'Melakukan analisa terhadap risiko bisnis yang masuk', 'job_qualification' => 'pernah bekerja sebagai underwriting selama 10 tahun',
                'job_activities' => 'analisa risiko bisnis dan menerima bisnis',
                'valid_end' => '2024-12-31',
                'location' => 'Jakarta',
                'working_type' => 'Fulltime'
            ],
        ]);
    }
}
