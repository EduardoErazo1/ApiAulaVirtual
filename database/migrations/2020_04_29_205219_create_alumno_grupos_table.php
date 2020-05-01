<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_grupos', function (Blueprint $table) {
            $table->bigIncrements("Id");
            $table ->unsignedBigInteger('Codigo_Grupo');                 
            $table ->unsignedBigInteger('Id_Alumno');  
            $table->foreign('Codigo_Grupo')-> references('Id')->on('grupos');            
            $table->foreign('Id_Alumno')-> references('Id')->on('alumnos');
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
        Schema::dropIfExists('alumno_grupos');
    }
}
