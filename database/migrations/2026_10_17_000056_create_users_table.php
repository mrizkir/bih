<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('name', 255);
            $table->string('nomor_hp', 255);
            $table->string('email', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('theme', 255)->default('default');
            $table->string('foto', 255)->default('storage/images/users/no_photo.png');
            $table->boolean('active')->default(1);
            $table->boolean('isdeleted')->default(1);
            $table->string('default_role', 15);
            $table->string('remember_token', 100)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unique('email', 'users_email_unique');
            $table->unique('nomor_hp', 'users_nomor_hp_unique');
            $table->unique('username', 'users_username_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
