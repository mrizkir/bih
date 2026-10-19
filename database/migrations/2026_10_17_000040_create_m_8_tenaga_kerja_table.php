<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_8_tenaga_kerja', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('tahun');
            $table->integer('penduduk_usia_kerja')->nullable();
            $table->integer('angkatan_kerja')->nullable();
            $table->integer('bekerja')->nullable();
            $table->integer('mencari_pekerjaan')->nullable();
            $table->float('tingkat_partisipasi')->nullable();
            $table->float('tingkat_pengangguran')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary('tahun');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_8_tenaga_kerja');
    }
};
