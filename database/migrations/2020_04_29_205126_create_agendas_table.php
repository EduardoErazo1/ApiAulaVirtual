<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Codigo_Agenda',15);
            $table->date('fecha');
            $table->string('titulo',50);  
            $table->string('descripcion',255);        
            $table ->unsignedBigInteger('Codigo_Curso');  
            $table->foreign('Codigo_Curso')-> references('Id')->on('cursos');
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
        Schema::dropIfExists('agendas');
    }
}
