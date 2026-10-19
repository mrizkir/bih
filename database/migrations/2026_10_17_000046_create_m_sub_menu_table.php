<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_sub_menu', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id_sub_menu');
            $table->integer('id_menu')->nullable();
            $table->string('nama', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('sumber_data', 255)->nullable();
            $table->integer('versi')->default(1);
            $table->primary('id_sub_menu');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_sub_menu');
    }
};
