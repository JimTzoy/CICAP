<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecompleto');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('ipcliente');
            $table->string('ipantena');
            $table->string('fechainicio');
            $table->string('fechafin');
            $table->unsignedBigInteger('plan_id');
            $table->unsignedBigInteger('antena_id');
            $table->unsignedBigInteger('tecnico_id');
            $table->timestamps();
            $table->foreign('plan_id')
                ->references('id')
                ->on('plans')
                ->onDelete('cascade');
            $table->foreign('antena_id')
                ->references('id')
                ->on('antenas')
                ->onDelete('cascade');
            $table->foreign('tecnico_id')
                ->references('id')
                ->on('tecnicos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
