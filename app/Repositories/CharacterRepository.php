<?php

namespace App\Repositories;

use App\Http\Resources\CharacterResource;
use App\Http\Resources\ComicResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\SerieResource;
use App\Http\Resources\StoryResource;
use App\Models\Character;
use App\Models\Comic;
use App\Models\Event;
use App\Models\Serie;
use App\Models\Story;

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
  
  public function getSeries($characterId)
  {
    $series = Serie::join('character_serie', 'series.id', '=', 'character_serie.serie_id')->where('character_serie.character_id', '=', $characterId)->get();

    return SerieResource::collection($series);
  }

  public function getStories($characterId)
  {
    $stories = Story::join('character_story', 'stories.id', '=', 'character_story.story_id')->where('character_story.character_id', '=', $characterId)->get();

    return StoryResource::collection($stories);
  }
}
