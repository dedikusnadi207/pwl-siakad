<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collegers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('nik', 20)->unique();
            $table->string('npm', 20)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone', 20);
            $table->text('address');
            $table->string('npwp', 100)->nullable();
            $table->string('birth_place', 100);
            $table->date('birth_date');
            $table->string('photo')->nullable();
            $table->integer('year')->unsigned();
            $table->string('status', 20); //ACTIVE, INACTIVE
            $table->string('class_type', 3); // R, S, X
            $table->string('class_group', 3); // A, B, C
            $table->tinyInteger('semester');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collegers');
    }
}
