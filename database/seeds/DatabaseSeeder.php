<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacultiesSeeder::class);
        $this->call(StudyProgramsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(ClassesSeeder::class);
        $this->call(ClassCourseSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(StudyPlanCardSeeder::class);
    }
}
