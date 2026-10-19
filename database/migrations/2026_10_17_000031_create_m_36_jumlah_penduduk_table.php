<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_36_jumlah_penduduk', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'MyISAM';

            $table->integer('tahun');
            $table->float('laki')->nullable();
            $table->float('perempuan')->nullable();
            $table->float('total')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary('tahun');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_36_jumlah_penduduk');
    }
};
