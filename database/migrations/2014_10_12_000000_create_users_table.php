<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('nomor_hp')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable(); 
            $table->string('theme')->default('default');
            $table->string('foto')->default('storage/images/users/no_photo.png');
            $table->boolean('active')->default(true);
			$table->boolean('isdeleted')->default(true);
			$table->string('default_role',15);           
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
