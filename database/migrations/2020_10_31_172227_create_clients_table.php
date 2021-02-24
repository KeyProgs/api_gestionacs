<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->char('nom', 40)->nullable(false);
            $table->char('prenom', 40);
            $table->char('cp', 10);
            $table->date('dn');
            $table->char('ville', 40)->nullable();
            $table->char('activite', 40)->nullable();
            $table->char('email', 40);
            $table->char('portable', 10)->nullable();
            $table->char('fixe', 10)->nullable();
            $table->char('indicatif', 5)->nullable();
            $table->char('adresse', 40)->nullable();
            $table->timestamps();
        });
    }

//    var setData={
//    'name':GetById('name'),
//    'prenom':GetById('prenom'),
//    'cp':GetById('cp'),
//    'dn':GetById('dn'),
//    'ville':GetById('ville'),
//    'activite':GetById('activite'),
//    'email':GetById('email'),
//    'portable':GetById('portable'),
//    'fixe':GetById('fixe'),
//    'matricule':GetById('matricule'),
//    'titulaire':"1",
//    'usage':"1"
//}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
