<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained();
            $table->string('name');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('pagu');
            $table->string('nilaikontrak');
            $table->string('nokontrak');
            $table->string('tglkontrak');
            $table->string('bataspelaksanaan');
            $table->string('penyedia');
            $table->string('realisasi');
            $table->string('kemajuan');
            $table->string('fisik');
            $table->string('ket');
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
        Schema::dropIfExists('kegiatans');
    }
};
