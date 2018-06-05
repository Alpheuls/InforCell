<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('cpf', 30);
            $table->string('email', 50);
            $table->string('celular', 11);
            $table->string('CEP',20);
            $table->string('rua', 150);
            $table->string('Bairro');
            $table->string('Cidade', 150);            
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
        Schema::dropIfExists('cliente_tables');
    }
}
