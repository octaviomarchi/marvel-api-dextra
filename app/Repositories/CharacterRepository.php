<?php

namespace App\Repositories;

use App\Http\Resources\CharacterResource;
use App\Http\Resources\ComicResource;
use App\Http\Resources\EventResource;
use App\Models\Character;
use App\Models\Comic;
use App\Models\Event;
use App\Models\Serie;
use App\Models\Story;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CharacterRepository
{
  public function findAll()
  {
    $characters = CharacterResource::collection(Character::all());


    return $characters;
  }

  public function findById($id)
  {
    $character = Character::find($id);

    if ($character === null) {
      return $character;
    }

    return new CharacterResource($character);
  }

  public function getComics($characterId)
  {
    $comics = Comic::join('character_comic', 'comics.id', '=', 'character_comic.comic_id')->where('character_comic.character_id', '=', $characterId)->get();

    return ComicResource::collection($comics);
  }

  public function getEvents($characterId)
  {
    $events = Event::join('character_event', 'events.id', '=', 'character_event.event_id')->where('character_event.character_id', '=', $characterId)->get();

    return EventResource::collection($events);
  }
}
