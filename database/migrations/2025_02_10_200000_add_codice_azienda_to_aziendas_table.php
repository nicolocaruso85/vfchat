<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCodiceAziendaToAziendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aziendas', function (Blueprint $table) {
            $table->string('codice_azienda')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aziendas', function (Blueprint $table) {
            $table->dropColumn(['codice_azienda']);
        });
    }
}
