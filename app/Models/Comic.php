<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
  use HasFactory;

  const UPDATED_AT = 'modified';

  public function characters()
  {
    return $this->belongsToMany(Character::class, 'character_comic');
  }

  public function events()
  {
    return $this->belongsToMany(Event::class, 'comic_event');
  }

  public function series()
  {
    return $this->belongsToMany(Serie::class, 'comic_serie');
  }

  public function stories()
  {
    return $this->belongsToMany(Story::class, 'comic_class');
  }
}
