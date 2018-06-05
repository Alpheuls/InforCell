<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente', 30);
            $table->decimal('valor_pedido', 8,2);
            $table->decimal('taxa', 5,2);
            $table->decimal('dinheiro', 8, 2);
            $table->decimal('credito', 8, 2);
            $table->decimal('debito', 8, 2);
            $table->decimal('boleto', 5, 2);
            $table->decimal('troco', 8, 2);
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
        Schema::dropIfExists('registros');
    }
}
