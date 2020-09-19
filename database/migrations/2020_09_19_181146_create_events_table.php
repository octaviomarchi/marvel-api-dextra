<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('events', function (Blueprint $table) {
      $table->id()->autoIncrement();
      $table->string('title', 45);
      $table->text('description');
      $table->timestamp('start', 0);
      $table->timestamp('end', 0);
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
    Schema::dropIfExists('events');
  }
}
