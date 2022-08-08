<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegerStudyProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleger_study_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('colleger_id')->unsigned()->index();
            $table->bigInteger('study_program_id')->unsigned()->index();
            $table->string('class_group', 10);
            $table->timestamps();

            $table->foreign('colleger_id')->references('id')->on('collegers');
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
        Schema::dropIfExists('colleger_study_programs');
    }
}
