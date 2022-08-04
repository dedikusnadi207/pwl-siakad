<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('study_programs')->insertOrIgnore([
            [
                'id' => 1,
                'faculty_id' => 1,
                'name' => 'Bimbingan dan Konseling',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'faculty_id' => 1,
                'name' => 'Pendidikan Ekonomi',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'faculty_id' => 1,
                'name' => 'Pendidikan Sejarah',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 4,
                'faculty_id' => 2,
                'name' => 'Pendidikan Bahasa Indonesia',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 5,
                'faculty_id' => 2,
                'name' => 'Pendidikan Bahasa Inggris',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 6,
                'faculty_id' => 2,
                'name' => 'Desain Komunikasi Visual',
                'accreditation' => 'A',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 7,
                'faculty_id' => 3,
                'name' => 'Pendidikan Matematika',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 8,
                'faculty_id' => 3,
                'name' => 'Pendidikan Biologi',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 9,
                'faculty_id' => 3,
                'name' => 'Pendidikan Fisika',
                'accreditation' => 'A',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 10,
                'faculty_id' => 4,
                'name' => 'Arsitektur',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 11,
                'faculty_id' => 4,
                'name' => 'Teknik Industri',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 12,
                'faculty_id' => 4,
                'name' => 'Teknik Informatika',
                'accreditation' => 'B',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
