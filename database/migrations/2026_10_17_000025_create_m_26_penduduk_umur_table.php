<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_26_penduduk_umur', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('tahun');
            $table->integer('kelompok_umur');
            $table->integer('jumlah')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary(['tahun', 'kelompok_umur']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_26_penduduk_umur');
    }
};
