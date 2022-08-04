<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyPlanCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_plan_card_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('study_plan_card_id')->unsigned()->index();
            $table->bigInteger('class_course_id')->unsigned()->index();
            $table->decimal('grade', 5, 2)->nullable();
            $table->string('index', 3)->nullable();
            $table->decimal('index_grade', 5, 2)->nullable();
            $table->timestamps();

            $table->foreign('study_plan_card_id')->references('id')->on('study_plan_cards');
            $table->foreign('class_course_id')->references('id')->on('class_courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_plan_card_details');
    }
}
