<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanctionTableCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanctions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('sinistre_id');
            $table->foreign('sinistre_id')->references('id')->on('sinistres');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->date('date')->nullable();
            $table->date('sanction_date_d')->nullable();
            $table->date('sanction_date_f')->nullable();
            $table->boolean('circonstance_pro')->nullable();
            $table->string('ethylotest')->nullable();
            $table->string('sangtest')->nullable();


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
        Schema::dropIfExists('sanctions');
    }
}
