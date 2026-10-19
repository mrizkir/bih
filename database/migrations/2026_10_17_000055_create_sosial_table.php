<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sosial', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->year('tahun');
            $table->tinyInteger('data_series');
            $table->decimal('persentase', 5, 2);
            $table->string('jenis_data', 15);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->index('tahun', 'sosial_tahun_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sosial');
    }
};
