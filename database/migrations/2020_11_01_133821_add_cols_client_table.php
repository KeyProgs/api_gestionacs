<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->char('rue', 20)->nullable()->after('adresse');
            $table->char('typevoie', 20)->nullable()->after('adresse');
            $table->char('nomvoie', 20)->nullable()->after('adresse');
            $table->char('activite_id', 20)->nullable()->after('prenom');


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
            //
        });
    }
}
