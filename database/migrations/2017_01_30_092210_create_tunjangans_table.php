<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTunjangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunjangans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_tunjangan')->unique();
            $table->unsignedInteger('id_jabatan')->nullable();
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('Cascade')->onUpdate('Cascade');
            $table->unsignedInteger('id_golongan')->nullable();
            $table->foreign('id_golongan')->references('id')->on('golongans')->onDelete('Cascade')->onUpdate('Cascade');
            $table->string('status');
            $table->integer('jumlah_anak');
            $table->integer('besaran_uang');
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
        Schema::dropIfExists('tunjangans');
    }
}
