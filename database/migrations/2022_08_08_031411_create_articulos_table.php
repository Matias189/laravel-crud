<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    // tabla articulos y sus campos listos para migrar a la BdD
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',10);            //string (10 caracteres)
            $table->string('descripcion',50);       //string, (50 caracteres)
            $table->integer('cantidad');            //integer
            $table->decimal('precio', 8, 2);        //decimal (8 enteros y 2 decimales)
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
};
