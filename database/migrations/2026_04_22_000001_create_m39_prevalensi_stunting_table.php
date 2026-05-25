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
    Schema::create('m_39_prevalensi_stunting', function (Blueprint $table) {
      $table->id();
      $table->year('tahun');
      $table->decimal('prevalensi', 5, 2);
      $table->tinyInteger('status_data'); //1 = Data Sementara, 2 = Data Tetap, 3 = Data Estimasi
      $table->string('sumber', 50)->default('BPS');
      $table->timestamps();

      $table->index('tahun');
      $table->index('status_data');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('m_39_prevalensi_stunting');
  }
};
