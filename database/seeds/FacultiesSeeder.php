<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('faculties')->insertOrIgnore([
            [
                'id' => 1,
                'short_name' => 'FIPPS',
                'name' => 'Fakultas Ilmu Pendidikan dan Pengetahuan Sosial',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'short_name' => 'FBS',
                'name' => 'Fakultas Bahasa dan Seni',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'short_name' => 'FMIPA',
                'name' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'short_name' => 'FTIK',
                'name' => 'Fakultas Teknik dan Ilmu Komputer',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
