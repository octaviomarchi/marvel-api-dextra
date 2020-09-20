<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
  use HasFactory;

  const UPDATED_AT = 'modified';

  public function characters()
  {
    return $this->belongsToMany('App\Models\Character', 'character_serie');
  }

  public function comics()
  {
    return $this->belongsToMany(Comic::class, 'comic_serie');
  }

  public function events()
  {
    return $this->belongsToMany(Events::class, 'event_serie');
  }

  public function stories()
  {
    return $this->belongsToMany(Serie::class, 'story_serie');
  }
}
