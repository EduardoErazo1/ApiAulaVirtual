<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinadores', function (Blueprint $table) {
            $table->bigIncrements("Id");
            $table->string('Id_Coordinador',15) ->unique();
            $table->string('DUI',10);
            $table->string('Nombre1',255);
            $table->string('Nombre2',255);
            $table->string('Apellido1',255);
            $table->string('Apellido2',255);
            $table->date('Fecha_Nac');
            $table->unsignedBigInteger('Id_Estado');
            $table->unsignedBigInteger('Id_Credencial');
            $table->foreign('Id_Estado')-> references('Id')->on('estados');
            $table->foreign('Id_Credencial')-> references('Id')->on('credenciales');
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
        Schema::dropIfExists('coordinadores');
    }
}
