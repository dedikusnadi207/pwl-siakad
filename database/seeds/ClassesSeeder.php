<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('classes')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Reguler',
                'type' => 'R',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'name' => 'Sore',
                'type' => 'S',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'name' => 'Non Reguler X',
                'type' => 'X',
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 4,
                'name' => 'Non Reguler Y',
                'type' => 'X',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
