<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegerStudyPlanCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleger_study_plan_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('colleger_id')->unsigned()->index();
            $table->bigInteger('study_plan_card_id')->unsigned()->index();
            $table->bigInteger('period_id')->unsigned()->index();
            $table->string('status', 20);
            $table->timestamps();

            $table->foreign('colleger_id')->references('id')->on('collegers');
            $table->foreign('study_plan_card_id')->references('id')->on('study_plan_cards');
            $table->foreign('period_id')->references('id')->on('periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleger_study_plan_cards');
    }
}
