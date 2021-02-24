<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActionEtatAddCols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actions', function (Blueprint $table) {
            //
//            $table->unsignedBigInteger('id_action_etat_type')->nullable();
//            $table->foreign('id_action_etat_type')->references('id')->on('action_etat');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actions_etats', function (Blueprint $table) {
            //
        });
    }
}
