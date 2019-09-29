<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTractamentTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('client_tractament', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id');
            $table->integer('tractament_id');
            $table->timestamps();


            $table->unique(['client_id', 'tractament_id']);
            $table->foreign('client_id')->references('id')->on('clients')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tractament_id')->references('id')->on('tractaments')
                    ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('client_tractament');
    }

}
