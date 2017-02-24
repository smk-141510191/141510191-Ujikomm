<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjanganPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangan_pegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kode_tunjangan_id');
            $table->foreign('kode_tunjangan_id')->references('id')->on('tunjangans')->onDelete('Cascade')->onUpdate('Cascade');
            $table->unsignedInteger('id_pegawai')->nullable();
            $table->foreign('id_pegawai')->references('id')->on('pegawais')->onDelete('Cascade')->onUpdate('Cascade');
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
        Schema::dropIfExists('tunjangan_pegawais');
    }
}
