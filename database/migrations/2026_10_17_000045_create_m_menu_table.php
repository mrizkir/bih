<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_menu', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id_menu');
            $table->string('nama_menu', 255)->nullable();
            $table->primary('id_menu');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_menu');
    }
};
