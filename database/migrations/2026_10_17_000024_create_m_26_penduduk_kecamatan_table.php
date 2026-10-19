<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_26_penduduk_kecamatan', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id')->autoIncrement();
            $table->string('kecamatan', 255)->nullable();
            $table->float('laki')->nullable();
            $table->float('perempuan')->nullable();
            $table->year('tahun')->nullable();
            $table->integer('status_data')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_26_penduduk_kecamatan');
    }
};
