<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaestroGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestro_grupos', function (Blueprint $table) {
            $table->bigIncrements("Id");
            $table ->unsignedBigInteger('Codigo_Grupo');                 
            $table ->unsignedBigInteger('Id_Maestro');  
            $table->foreign('Codigo_Grupo')-> references('Id')->on('grupos');            
            $table->foreign('Id_Maestro')-> references('Id')->on('maestros');
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
        Schema::dropIfExists('maestro_grupos');
    }
}
