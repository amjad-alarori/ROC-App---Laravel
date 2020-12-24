<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('functie')->unique();
            $table->string('leerweg');
            $table->integer('aantal_plaatsen');
            $table->date('start_datum');
            $table->date('eind_datum');
            $table->string('wat_te_doen');
            $table->string('werkzaamheden');
            $table->string('wat_zoeken_wij');
            $table->foreignId('stageBedrijf_id')->constrained('stage_bedrijvens');
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
        Schema::dropIfExists('stages');
    }
}
