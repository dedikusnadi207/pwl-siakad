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
            $table->timestamps();

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
        Schema::dropIfExists('academic_supervisors');
    }
}
