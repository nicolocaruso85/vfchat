<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipendentiNegoziosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipendenti_negozios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dipendente');
            $table->foreignId('id_negozio');

            $table->foreign('id_dipendente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_negozio')->references('id')->on('negozios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dipendenti_negozios');
    }
}
