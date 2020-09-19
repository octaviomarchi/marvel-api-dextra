<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationsTables extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('character_comic', function (Blueprint $table) {
      $table->integer('character_id')->unsigned();
      $table->integer('comic_id')->unsigned();
      $table->foreign('character_id')->references('id')->on('characters')
        ->onDelete('cascade');
      $table->foreign('comic_id')->references('id')->on('comics')
        ->onDelete('cascade');
    });

    Schema::create('character_story', function (Blueprint $table) {
      $table->integer('character_id')->unsigned();
      $table->integer('story_id')->unsigned();
      $table->foreign('character_id')->references('id')->on('characters')
        ->onDelete('cascade');
      $table->foreign('story_id')->references('id')->on('stories')
        ->onDelete('cascade');
    });

    Schema::create('character_event', function (Blueprint $table) {
      $table->integer('character_id')->unsigned();
      $table->integer('event_id')->unsigned();
      $table->foreign('character_id')->references('id')->on('characters')
        ->onDelete('cascade');
      $table->foreign('event_id')->references('id')->on('events')
        ->onDelete('cascade');
    });

    Schema::create('character_serie', function (Blueprint $table) {
      $table->integer('character_id')->unsigned();
      $table->integer('serie_id')->unsigned();
      $table->foreign('character_id')->references('id')->on('characters')
        ->onDelete('cascade');
      $table->foreign('serie_id')->references('id')->on('series')
        ->onDelete('cascade');
    });

    Schema::create('comic_story', function (Blueprint $table) {
      $table->integer('comic_id')->unsigned();
      $table->integer('story_id')->unsigned();
      $table->foreign('comic_id')->references('id')->on('comics')
        ->onDelete('cascade');
      $table->foreign('story_id')->references('id')->on('stories')
        ->onDelete('cascade');
    });

    Schema::create('comic_event', function (Blueprint $table) {
      $table->integer('comic_id')->unsigned();
      $table->integer('event_id')->unsigned();
      $table->foreign('comic_id')->references('id')->on('comics')
        ->onDelete('cascade');
      $table->foreign('event_id')->references('id')->on('events')
        ->onDelete('cascade');
    });

    Schema::create('comic_serie', function (Blueprint $table) {
      $table->integer('comic_id')->unsigned();
      $table->integer('serie_id')->unsigned();
      $table->foreign('comic_id')->references('id')->on('comics')
        ->onDelete('cascade');
      $table->foreign('serie_id')->references('id')->on('series')
        ->onDelete('cascade');
    });

    Schema::create('story_event', function (Blueprint $table) {
      $table->integer('story_id')->unsigned();
      $table->integer('event_id')->unsigned();
      $table->foreign('story_id')->references('id')->on('stories')
        ->onDelete('cascade');
      $table->foreign('event_id')->references('id')->on('events')
        ->onDelete('cascade');
    });

    Schema::create('story_serie', function (Blueprint $table) {
      $table->integer('story_id')->unsigned();
      $table->integer('serie_id')->unsigned();
      $table->foreign('story_id')->references('id')->on('stories')
        ->onDelete('cascade');
      $table->foreign('serie_id')->references('id')->on('series')
        ->onDelete('cascade');
    });

    Schema::create('event_serie', function (Blueprint $table) {
      $table->integer('event_id')->unsigned();
      $table->integer('serie_id')->unsigned();
      $table->foreign('event_id')->references('id')->on('events')
        ->onDelete('cascade');
      $table->foreign('serie_id')->references('id')->on('series')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('character_comic');
    Schema::dropIfExists('character_story');
    Schema::dropIfExists('character_event');
    Schema::dropIfExists('character_serie');
    Schema::dropIfExists('comic_story');
    Schema::dropIfExists('comic_event');
    Schema::dropIfExists('comic_serie');
    Schema::dropIfExists('story_event');
    Schema::dropIfExists('story_serie');
    Schema::dropIfExists('event_serie');
  }
}
