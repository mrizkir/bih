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
    Schema::create('sosial', function (Blueprint $table) {
      $table->id();
      $table->year('tahun');
      $table->tinyInteger('data_series'); //1 = Data Sementara, 2 = Data Tetap, 3 = Data Estimasi
      $table->decimal('persentase',5,2);      
      $table->timestamps();

      $table->index('tahun');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sosial');
  }
};
