<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->double('peso', 8, 2);
            $table->double('altura', 8, 2);
            $table->double('resultado', 8, 2);
            $table->string('diagnostico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imc');
    }
}
