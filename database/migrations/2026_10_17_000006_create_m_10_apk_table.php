<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_10_apk', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->string('tingkat', 50);
            $table->integer('tahun');
            $table->float('APK')->nullable();
            $table->integer('no')->nullable();
            $table->integer('status_data')->nullable();
            $table->primary(['tingkat', 'tahun']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_10_apk');
    }
};
