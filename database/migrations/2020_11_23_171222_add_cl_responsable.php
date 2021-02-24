<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClResponsable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sinistres', function (Blueprint $table) {
            $table->integer('responsable')->nullable()->after('sinistre_id');
            $table->integer('cout')->nullable()->after('responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinistres', function (Blueprint $table) {
            //
        });
    }
}
