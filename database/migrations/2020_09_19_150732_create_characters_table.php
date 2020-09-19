<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::create('characters', function (Blueprint $table) {
      $table->id()->autoIncrement();
      $table->string('name', 45)->nullable(false);
      $table->text('description')->nullable(false);
      $table->string('thumbnail', 45)->nullable(false);
      $table->timestamp('created_at', 0)->nullable(false)->useCurrent();
      $table->timestamp('modified', 0)->nullable(false)->useCurrent();

      $table->index(['name', 'modified']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('characters');
  }
}
