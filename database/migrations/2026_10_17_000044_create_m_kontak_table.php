<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_kontak', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id');
            $table->string('alamat', 255)->nullable();
            $table->string('telp', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->text('tentang')->nullable();
            $table->text('deskripsi')->nullable();
            $table->primary('id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_kontak');
    }
};
