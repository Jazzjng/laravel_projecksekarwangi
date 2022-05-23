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
        Schema::create('wbs_systen', function (Blueprint $table) {
            $table->integer('id_laporan');
            $table->string('penerima_laporan');
            $table->string('jenis_pelapor');
            $table->string('judul_laporan');
            $table->string('deskripsi');
            $table->string('unit_kerja');
            $table->string('jabatan');
            $table->string('surat_tugas');
            $table->string('bukti');
            $table->date('tgl_kejadian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wbs_systen');
    }
};
