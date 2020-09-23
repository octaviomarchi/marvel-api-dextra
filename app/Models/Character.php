<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
  use HasFactory;

  const UPDATED_AT = 'modified';

  protected $hidden = ['pivot'];

  public function comics()
  {
    return $this->belongsToMany(Comic::class, 'character_comic');
  }

  public function events()
  {
    return $this->belongsToMany(Event::class, 'character_event');
  }

  public function series()
  {
    return $this->belongsToMany(Serie::class, 'character_serie');
  }

  public function stories()
  {
    return $this->belongsToMany(Story::class, 'character_story');
  }
}
