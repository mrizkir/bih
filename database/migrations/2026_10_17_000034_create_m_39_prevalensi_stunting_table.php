<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_39_prevalensi_stunting', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->year('tahun');
            $table->decimal('prevalensi', 5, 2);
            $table->tinyInteger('status_data');
            $table->string('sumber', 50)->default('BPS');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->index('status_data', 'm_39_prevalensi_stunting_status_data_index');
            $table->index('tahun', 'm_39_prevalensi_stunting_tahun_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_39_prevalensi_stunting');
    }
};
