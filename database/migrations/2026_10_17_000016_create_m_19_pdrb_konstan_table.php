<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_19_pdrb_konstan', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('uraian');
            $table->integer('tahun');
            $table->double('jumlah')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary(['uraian', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_19_pdrb_konstan');
    }
};
