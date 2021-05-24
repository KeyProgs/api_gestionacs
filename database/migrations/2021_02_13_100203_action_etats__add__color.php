<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ActionEtatsAddColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('action_etats', function (Blueprint $table) {
            //
            $table->string('color', 20)->nullable()->after('titre')->default('badge-danger');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('action_etat', function (Blueprint $table) {
            //
        });
    }
}
