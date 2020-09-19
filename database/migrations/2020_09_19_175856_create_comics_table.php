<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('comics', function (Blueprint $table) {
      $table->id()->autoIncrement();
      $table->integer('digital_id')->default(0);
      $table->string('title', 45)->nullable(false);
      $table->decimal('issue_number', 8, 2)->default(0);
      $table->text('description')->nullable(false);
      $table->string('isbn', 45)->nullable();
      $table->string('upc', 45)->nullable();
      $table->string('diamond_code', 45);
      $table->string('ean', 45);
      $table->string('issn', 45);
      $table->string('format', 45);
      $table->integer('page_count');
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
    Schema::dropIfExists('comics');
  }
}
