<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('class_courses')->insertOrIgnore([
            [
                'id' => 1,
                'class_id' => 3,
                'course_id' => 17,
                'lecturer_id' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'class_id' => 4,
                'course_id' => 18,
                'lecturer_id' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'class_id' => 3,
                'course_id' => 19,
                'lecturer_id' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 4,
                'class_id' => 3,
                'course_id' => 20,
                'lecturer_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 5,
                'class_id' => 3,
                'course_id' => 21,
                'lecturer_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 6,
                'class_id' => 4,
                'course_id' => 22,
                'lecturer_id' => 13,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 7,
                'class_id' => 4,
                'course_id' => 23,
                'lecturer_id' => 14,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 8,
                'class_id' => 4,
                'course_id' => 24,
                'lecturer_id' => 15,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 9,
                'class_id' => 3,
                'course_id' => 9,
                'lecturer_id' => 16,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 10,
                'class_id' => 3,
                'course_id' => 13,
                'lecturer_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 11,
                'class_id' => 3,
                'course_id' => 14,
                'lecturer_id' => 20,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 12,
                'class_id' => 3,
                'course_id' => 15,
                'lecturer_id' => 21,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 13,
                'class_id' => 4,
                'course_id' => 10,
                'lecturer_id' => 17,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 14,
                'class_id' => 4,
                'course_id' => 11,
                'lecturer_id' => 18,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 15,
                'class_id' => 4,
                'course_id' => 12,
                'lecturer_id' => 19,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 16,
                'class_id' => 4,
                'course_id' => 16,
                'lecturer_id' => 22,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 17,
                'class_id' => 3,
                'course_id' => 1,
                'lecturer_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 18,
                'class_id' => 4,
                'course_id' => 2,
                'lecturer_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 19,
                'class_id' => 4,
                'course_id' => 3,
                'lecturer_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 20,
                'class_id' => 3,
                'course_id' => 4,
                'lecturer_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 21,
                'class_id' => 3,
                'course_id' => 5,
                'lecturer_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 22,
                'class_id' => 3,
                'course_id' => 6,
                'lecturer_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 23,
                'class_id' => 4,
                'course_id' => 7,
                'lecturer_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 24,
                'class_id' => 4,
                'course_id' => 8,
                'lecturer_id' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
