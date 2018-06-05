<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('o_s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('end', 100);
            $table->string('tel', 15);
            $table->string('produto', 25);
            $table->string('acessorio', 150);
            $table->string('problema', 150);
            $table->string('marca', 50);
            $table->string('modelo', 70);
            $table->string('status', 70);
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
        Schema::dropIfExists('o_s');
    }
}
