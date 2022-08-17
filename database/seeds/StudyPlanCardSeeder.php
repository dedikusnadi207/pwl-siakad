<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyPlanCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('study_plan_cards')->insertOrIgnore([
            [
                'id' => 1,
                'class_type' => 'X',
                'class_group' => 'B',
                'semester' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 2,
                'class_type' => 'X',
                'class_group' => 'B',
                'semester' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ], [
                'id' => 3,
                'class_type' => 'X',
                'class_group' => 'B',
                'semester' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
        DB::table('study_plan_card_details')->insertOrIgnore([
            [
                'id' => 1,
                'study_plan_card_id' => 1,
                'class_course_id' => 1,
                'day' => 'friday',
                'start_time_schedule' => '19:00:00',
                'end_time_schedule' => '21:30:00',
            ], [
                'id' => 2,
                'study_plan_card_id' => 1,
                'class_course_id' => 2,
                'day' => 'friday',
                'start_time_schedule' => '19:00:00',
                'end_time_schedule' => '21:30:00',
            ], [
                'id' => 3,
                'study_plan_card_id' => 1,
                'class_course_id' => 3,
                'day' => 'saturday',
                'start_time_schedule' => '07:00:00',
                'end_time_schedule' => '09:30:00',
            ], [
                'id' => 4,
                'study_plan_card_id' => 1,
                'class_course_id' => 4,
                'day' => 'saturday',
                'start_time_schedule' => '10:00:00',
                'end_time_schedule' => '12:30:00',
            ], [
                'id' => 5,
                'study_plan_card_id' => 1,
                'class_course_id' => 5,
                'day' => 'saturday',
                'start_time_schedule' => '12:30:00',
                'end_time_schedule' => '14:10:00',
            ], [
                'id' => 6,
                'study_plan_card_id' => 1,
                'class_course_id' => 6,
                'day' => 'saturday',
                'start_time_schedule' => '07:00:00',
                'end_time_schedule' => '09:30:00',
            ], [
                'id' => 7,
                'study_plan_card_id' => 1,
                'class_course_id' => 7,
                'day' => 'saturday',
                'start_time_schedule' => '12:30:00',
                'end_time_schedule' => '14:10:00',
            ], [
                'id' => 8,
                'study_plan_card_id' => 1,
                'class_course_id' => 8,
                'day' => 'saturday',
                'start_time_schedule' => '10:00:00',
                'end_time_schedule' => '12:30:00',
            ], [
                'id' => 9,
                'study_plan_card_id' => 2,
                'class_course_id' => 9,
                'day' => 'friday',
                'start_time_schedule' => '19:00:00',
                'end_time_schedule' => '21:30:00',
            ], [
                'id' => 10,
                'study_plan_card_id' => 2,
                'class_course_id' => 13,
                'day' => 'friday',
                'start_time_schedule' => '19:00:00',
                'end_time_schedule' => '21:30:00',
            ], [
                'id' => 11,
                'study_plan_card_id' => 2,
                'class_course_id' => 14,
                'day' => 'saturday',
                'start_time_schedule' => '07:00:00',
                'end_time_schedule' => '09:30:00',
            ], [
                'id' => 12,
                'study_plan_card_id' => 2,
                'class_course_id' => 15,
                'day' => 'saturday',
                'start_time_schedule' => '10:00:00',
                'end_time_schedule' => '12:30:00',
            ], [
                'id' => 13,
                'study_plan_card_id' => 2,
                'class_course_id' => 10,
                'day' => 'saturday',
                'start_time_schedule' => '07:00:00',
                'end_time_schedule' => '09:30:00',
            ], [
                'id' => 14,
                'study_plan_card_id' => 2,
                'class_course_id' => 11,
                'day' => 'saturday',
                'start_time_schedule' => '10:00:00',
                'end_time_schedule' => '12:30:00',
            ], [
                'id' => 15,
                'study_plan_card_id' => 2,
                'class_course_id' => 12,
                'day' => 'saturday',
                'start_time_schedule' => '12:30:00',
                'end_time_schedule' => '14:10:00',
            ], [
                'id' => 16,
                'study_plan_card_id' => 2,
                'class_course_id' => 16,
                'day' => 'saturday',
                'start_time_schedule' => '12:30:00',
                'end_time_schedule' => '14:10:00',
            ], [
                'id' => 17,
                'study_plan_card_id' => 3,
                'class_course_id' => 17,
                'day' => 'friday',
                'start_time_schedule' => '18:30:00',
                'end_time_schedule' => '20:10:00',
            ], [
                'id' => 18,
                'study_plan_card_id' => 3,
                'class_course_id' => 18,
                'day' => 'friday',
                'start_time_schedule' => '18:30:00',
                'end_time_schedule' => '20:10:00',
            ], [
                'id' => 19,
                'study_plan_card_id' => 3,
                'class_course_id' => 19,
                'day' => 'saturday',
                'start_time_schedule' => '12:30:00',
                'end_time_schedule' => '14:10:00',
            ], [
                'id' => 20,
                'study_plan_card_id' => 3,
                'class_course_id' => 20,
                'day' => 'saturday',
                'start_time_schedule' => '12:30:00',
                'end_time_schedule' => '14:10:00',
            ], [
                'id' => 21,
                'study_plan_card_id' => 3,
                'class_course_id' => 21,
                'day' => 'saturday',
                'start_time_schedule' => '10:00:00',
                'end_time_schedule' => '12:30:00',
            ], [
                'id' => 22,
                'study_plan_card_id' => 3,
                'class_course_id' => 22,
                'day' => 'saturday',
                'start_time_schedule' => '07:30:00',
                'end_time_schedule' => '09:10:00',
            ], [
                'id' => 23,
                'study_plan_card_id' => 3,
                'class_course_id' => 23,
                'day' => 'saturday',
                'start_time_schedule' => '07:30:00',
                'end_time_schedule' => '09:10:00',
            ], [
                'id' => 24,
                'study_plan_card_id' => 3,
                'class_course_id' => 24,
                'day' => 'saturday',
                'start_time_schedule' => '10:00:00',
                'end_time_schedule' => '12:30:00',
            ]
        ]);
    }
}
