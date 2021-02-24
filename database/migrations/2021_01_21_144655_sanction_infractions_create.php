<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanctionInfractionsCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_infractions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('infraction_id');
            $table->unsignedBigInteger('sanction_id');
            $table->foreign('infraction_id')->references('id')->on('infractions');
            $table->foreign('sanction_id')->references('id')->on('sanctions');
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
        Schema::dropIfExists('sanction_infractions');
    }
}
