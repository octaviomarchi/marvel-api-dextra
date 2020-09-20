<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  const UPDATED_AT = 'modified';

  public function characters()
  {
    return $this->belongsToMany(Character::class, 'character_event');
  }

  public function comics()
  {
    return $this->belongsToMany(Comic::class, 'comic_event');
  }

  public function series()
  {
    return $this->belongsToMany(Serie::class, 'event_serie');
  }

  public function stories()
  {
    return $this->belongsToMany(Serie::class, 'story_event');
  }
}
