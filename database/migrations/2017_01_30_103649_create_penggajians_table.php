<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenggajiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajians', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tunjangan_pegawai_id')->nullable();
            $table->foreign('tunjangan_pegawai_id')->references('id')->on('tunjangan_pegawais')->onDelete('Cascade')->onUpdate('Cascade');
            $table->integer('jumlah_jam_lembur');
            $table->integer('jumlah_uang_lembur');
            $table->integer('gaji_pokok');
            $table->date('tanggal_pengambilan');
            $table->boolean('status_pengambilan')->default(0);
            $table->string('petugas_penerima');            
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
        Schema::dropIfExists('penggajians');
    }
}
