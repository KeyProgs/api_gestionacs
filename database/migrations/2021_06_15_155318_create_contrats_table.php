<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('templatecontrat_id')->constrained();
            $table->string('compagnie',30)->nullable();
            $table->string('nomcontrat',30)->nullable();
            $table->string('numerocontrat',30)->nullable();
            $table->string('jourprelevement',30)->nullable();
            $table->string('montant',30)->nullable();
            $table->date('dateeffet')->nullable();
            $table->string('status')->nullable();
            $table->string('BIC',30)->nullable();
            $table->string('IBAN',30)->nullable();
            $table->string('note')->nullable();
            $table->string('CONTRACT')->nullable();
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
        Schema::dropIfExists('contrats');
    }
}
