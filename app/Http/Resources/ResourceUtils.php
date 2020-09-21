<?php

namespace App\Http\Resources;

class ResourceUtils
{
  public static function filterComics($comics)
  {
    $result = [];
    foreach ($comics as $comic) {
      array_push($result, [
        'resourceURI' => '/v1/public/comics/' . $comic["id"],
        'name' => $comic['title']
      ]);
    }
    return $result;
  }

  public static function filterEvents($events)
  {
    $result = [];
    foreach ($events as $event) {
      array_push($result, [
        'resourceURI' => '/v1/public/events/' . $event["id"],
        'name' => $event['title']
      ]);
    }
    return $result;
  }

  public static function filterSeries($series)
  {
    $result = [];
    foreach ($series as $serie) {
      array_push($result, [
        'resourceURI' => '/v1/public/series/' . $serie["id"],
        'name' => $serie['title']
      ]);
    }
    return $result;
  }

  public static function filterStories($stories)
  {
    $result = [];
    foreach ($stories as $story) {
      array_push($result, [
        'resourceURI' => '/v1/public/stories/' . $story["id"],
        'name' => $story['title']
      ]);
    }
    return $result;
  }

  public static function filterCharacters($characters)
  {
    $result = [];
    foreach ($characters as $character) {
      array_push($result, [
        'resourceURI' => '/v1/public/characters/' . $character["id"],
        'name' => $character['name']
      ]);
    }
    return $result;
  }
}
