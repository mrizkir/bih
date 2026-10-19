<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_jenis_data', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id');
            $table->string('jenis_data', 255)->nullable();
            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_jenis_data');
    }
};
