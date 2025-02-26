<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_tecnico')->constrained('users')->onDelete('cascade');
            $table->dateTime('fecha');
            $table->decimal('horas', 18, 2);
            $table->text('observaciones')->nullable();
            $table->foreignId('id_poliza')->nullable()->constrained('polizas')->onDelete('set null');
            $table->foreignId('id_factura')->nullable()->constrained('facturas')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
