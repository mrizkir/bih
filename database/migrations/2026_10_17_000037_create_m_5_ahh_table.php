<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_5_ahh', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('tahun');
            $table->float('ahh')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary('tahun');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_5_ahh');
    }
};
