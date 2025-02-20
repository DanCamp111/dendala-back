<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolizasTable extends Migration
{
    public function up()
    {
        Schema::create('polizas', function (Blueprint $table) {
            $table->id();
            $table->integer('total_horas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('precio', 18, 2);
            $table->unsignedBigInteger('id_cliente');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('polizas');
    }
}
