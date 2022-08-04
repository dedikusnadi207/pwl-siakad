<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('class_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
            $table->bigInteger('lecturer_id')->unsigned()->index();
            $table->string('day', 100);
            $table->time('start_time_schedule');
            $table->time('end_time_schedule');
            $table->timestamps();

            $table->foreign('class_id')->references('id')->on('classes');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_courses');
    }
}
