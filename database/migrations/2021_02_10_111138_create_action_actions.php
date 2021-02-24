<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionActions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_actions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_action1');
            $table->foreign('id_action1')->references('id')->on('actions')->nullable();
            $table->unsignedBigInteger('id_action2');
            $table->foreign('id_action2')->references('id')->on('actions')->nullable();
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
        Schema::dropIfExists('action_actions');
    }
}
