<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('series', function (Blueprint $table) {
      $table->id()->autoIncrement();
      $table->string('title', 45);
      $table->text('description');
      $table->year('start_year', 0);
      $table->year('end_year', 0);
      $table->string('rating')->default('PG16');
      $table->string('thumbnail');
      $table->timestamp('created_at', 0)->nullable(false)->useCurrent();
      $table->timestamp('modified', 0)->nullable(false)->useCurrent();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('series');
  }
}
