<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('system_statuses')->insert([
            [
                "status" => 'New Applicant',
                "status_desc" => 'Data dan dokumen kandidat baru berhasil dibuat'
            ],
            [
                "status" => 'Receive Notification',
                "status_desc" => 'Kandidat menerima undangan untuk melakukan interview'
            ],
            [
                "status" => 'Send Confirmation',
                "status_desc" => 'Applicant memberikan konfirmasi untuk kehadiran interview'
            ],
            [
                "status" => 'Interview HR',
                "status_desc" => 'Applicant masuk ke tahap interview oleh HR'
            ],
            [
                "status" => 'Psikotest',
                "status_desc" => 'Applicant berhasil masuk ke tahap psikotest'
            ],
            [
                "status" => 'Interview User',
                "status_desc" => 'Applicant berhasil masuk ke tahap interview user'
            ],
            [
                "status" => 'Offering Letter',
                "status_desc" => 'Applicant berhasil masuk ke tahap offering letter'
            ],
            [
                "status" => 'MCU',
                "status_desc" => 'Applicant berhasil masuk ke tahap MCU'
            ],
            [
                "status" => 'Accepted',
                "status_desc" => 'Applicant berhasil diterima bekerja di BCAinsurance sesuai posisi yang di apply'
            ],

            [
                "status" => 'View Applicant',
                "status_desc" => 'HR bisa melihat seluruh data applicant yang apply'
            ],
            [
                "status" => 'Edit Applicant',
                "status_desc" => 'HR bisa melakukan edit data applicant untuk penyesuaian dan kelengkapan dokumen / data'
            ],
            [
                "status" => 'Send Invitation',
                "status_desc" => 'HR mengirimkan notifikasi kepada applicant untuk menjalankan tahapan rekruitmen selanjutnya'
            ],
            [
                "status" => 'Receive Confirmation',
                "status_desc" => 'HR menerima notifikasi konformasi kehadiran kandidat'
            ],
        ]);
    }
}
