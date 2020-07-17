<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->on('usuarios')->references('id')->onDelete('cascade');

            //Pés
            $table->string('esquerdo_p1')->nullable();
            $table->string('esquerdo_p2')->nullable();
            $table->string('esquerdo_p3')->nullable();
            $table->string('direito_p1')->nullable();
            $table->string('direito_p2')->nullable();
            $table->string('direito_p3')->nullable();
            //GRID
            $table->string('esquerdo_p1_grid')->nullable();
            $table->string('esquerdo_p2_grid')->nullable();
            $table->string('esquerdo_p3_grid')->nullable();
            $table->string('direito_p1_grid')->nullable();
            $table->string('direito_p2_grid')->nullable();
            $table->string('direito_p3_grid')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('fotos');
    }
}
