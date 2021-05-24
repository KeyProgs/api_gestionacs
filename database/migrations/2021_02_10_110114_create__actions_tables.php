<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('titre', 99)->nullable();
            $table->date('dd')->nullable();
            $table->date('df')->nullable();

            $table->unsignedBigInteger('rapporteur');
            $table->foreign('rapporteur')->references('id')->on('users');

            $table->unsignedBigInteger('responsable');
            $table->foreign('responsable')->references('id')->on('users');

            $table->unsignedBigInteger('id_action_type');
            $table->foreign('id_action_type')->references('id')->on('action_types');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
