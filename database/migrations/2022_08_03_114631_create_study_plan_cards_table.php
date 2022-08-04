<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyPlanCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_plan_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('colleger_id')->unsigned()->index();
            $table->tinyInteger('semester');
            $table->integer('year')->unsigned();
            $table->string('status', 20);
            $table->timestamps();

            $table->foreign('colleger_id')->references('id')->on('collegers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_plan_cards');
    }
}
