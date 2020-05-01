<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements("Id");
            $table->string('Codigo_Documento',25)->unique();
            $table->string('ruta',255);     
            $table->string('nombre',255);       
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
        Schema::dropIfExists('documentos');
    }
}
