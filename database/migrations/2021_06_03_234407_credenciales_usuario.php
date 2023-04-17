<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CredencialesUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credenciales_usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('linea_id')->nullable();
            $table->string('imagen_perfil_path')->nullable();
            $table->string('titulo')->nullable();
            $table->text('semblanza')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('linea_id')->references('id')->on('lineas_investigacion');
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
        //
    }
}
