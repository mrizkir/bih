<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_18_inflasi', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('tahun');
            $table->float('umum')->nullable();
            $table->float('bahan_makanan')->nullable();
            $table->float('makanan_jadi')->nullable();
            $table->float('perumahan')->nullable();
            $table->float('sandang')->nullable();
            $table->float('kesehatan')->nullable();
            $table->float('pendidikan')->nullable();
            $table->float('transportasi')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary('tahun');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_18_inflasi');
    }
};
