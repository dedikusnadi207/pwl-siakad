<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegerStudyPlanCardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleger_study_plan_card_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('colleger_study_plan_card_id')->unsigned()->index('colleger_study_plan_card_details_parent_id_index');
            $table->bigInteger('study_plan_card_detail_id')->unsigned()->index('colleger_study_plan_card_details_spc_detail_id_index');
            $table->decimal('grade', 5, 2)->nullable();
            $table->string('index', 3)->nullable();
            $table->decimal('index_grade', 5, 2)->nullable();
            $table->string('status', 20);
            $table->timestamps();

            $table->foreign('colleger_study_plan_card_id', 'colleger_study_plan_card_details_parent_id_foreign')->references('id')->on('colleger_study_plan_cards');
            $table->foreign('study_plan_card_detail_id', 'colleger_study_plan_card_details_spc_detail_id_foreign')->references('id')->on('study_plan_card_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleger_study_plan_card_details');
    }
}
