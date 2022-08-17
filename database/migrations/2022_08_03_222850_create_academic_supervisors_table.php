<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lecturer_id')->unsigned()->index();
            $table->integer('year')->unsigned();
            $table->string('class_type', 3);
            $table->string('class_group', 3);
            $table->bigInteger('study_program_id')->unsigned()->index();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('study_program_id')->references('id')->on('study_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_supervisors');
    }
}
