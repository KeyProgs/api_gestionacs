<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->smallInteger('titulairecartegrise')->nullable();
            $table->smallInteger('client_id')->nullable();
            $table->smallInteger('typepermis')->nullable();
            $table->smallInteger('sitfam_id')->nullable();
            $table->smallInteger('financement_id')->nullable();
            $table->integer('km_range')->nullable();
            $table->date('dop')->nullable();
            $table->char('matricule', 20)->nullable(false);
            $table->integer('etat_assurance')->nullable();


            $table->integer('station_id')->nullable();


            $table->smallInteger('last3y_assure')->nullable();
            $table->smallInteger('last3y_interruption')->nullable();
            $table->integer('assureur_resiliation')->nullable();


            $table->char('station_cp_n', 8)->nullable();
            $table->char('station_ville_n', 30)->nullable();
            $table->char('station_cp_j', 8)->nullable();
            $table->char('station_ville_j', 30)->nullable();


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
        Schema::dropIfExists('voitures');
    }
}
