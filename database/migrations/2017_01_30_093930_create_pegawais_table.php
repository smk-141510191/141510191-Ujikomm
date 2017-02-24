<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip')->unique();
            $table->unsignedInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('Cascade')->onUpdate('Cascade');
            $table->unsignedInteger('id_jabatan')->nullable();
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('Cascade')->onUpdate('Cascade');
            $table->unsignedInteger('id_golongan')->nullable();
            $table->foreign('id_golongan')->references('id')->on('golongans')->onDelete('Cascade')->onUpdate('Cascade');
            $table->string('foto');
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
        Schema::dropIfExists('pegawais');
    }
}
