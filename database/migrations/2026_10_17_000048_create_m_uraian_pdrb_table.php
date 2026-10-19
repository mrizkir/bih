<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_uraian_pdrb', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id')->autoIncrement();
            $table->string('uraian', 255)->nullable();
            $table->string('kategori', 255)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_uraian_pdrb');
    }
};
