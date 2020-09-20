<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
  use HasFactory;

  protected $table = 'stories';

  const UPDATED_AT = 'modified';

  public function characters()
  {
    return $this->belongsToMany(Character::class, 'character_story');
  }

  public function comics()
  {
    return $this->belongsToMany(Comic::class, 'comic_story');
  }

  public function events()
  {
    return $this->belongsToMany(Event::class, 'story_event');
  }

  public function series()
  {
    return $this->belongsToMany(Serie::class, 'story_serie');
  }
}
