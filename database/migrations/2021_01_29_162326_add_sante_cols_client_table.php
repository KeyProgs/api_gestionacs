<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSanteColsClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
//            $table->date('sante_date_contrat')->nullable();
//            $table->string('sante_sc',20)->nullable();
            $table->string('sante_sc_clef',3)->nullable();
//            $table->boolean('sante_distance')->nullable();
//            $table->unsignedBigInteger('regime_id')->nullable();
//            $table->unsignedBigInteger('sante_assureur')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {


        });
    }
}
