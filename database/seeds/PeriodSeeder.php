<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $data = [];
        for ($i=2019; $i <= 2021; $i++) {
            $data = array_merge($data, [
                [
                    'start_year' => $i,
                    'end_year' => $i+1,
                    'semester' => 1,
                    'is_active' => false,
                    'created_at' => $now,
                    'updated_at' => $now,
                ], [
                    'start_year' => $i,
                    'end_year' => $i+1,
                    'semester' => 2,
                    'is_active' => $i == 2021,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            ]);
        }
        DB::table('periods')->insertOrIgnore($data);
    }
}
