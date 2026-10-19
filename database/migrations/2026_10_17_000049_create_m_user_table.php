<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->charset = 'latin1';
            $table->collation = 'latin1_swedish_ci';
            $table->engine = 'InnoDB';

            $table->integer('id_user')->autoIncrement();
            $table->string('username', 255)->nullable();
            $table->string('password', 255)->nullable();
            $table->integer('tipe')->nullable()->comment('1=super;2=admin');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
