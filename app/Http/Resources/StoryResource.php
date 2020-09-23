<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'resourceURI' => 'v1/public/stories/' . $this->id,
            'modified' => $this->modified,
            'type' => $this->type,
            'comics' => $this->comics,
            'series' => $this->series,
            'events' => $this->events,
            'characters' => $this->characters
        ];

        $array['comics'] = ResourceUtils::filterComics($array['comics']);
        $array['characters'] = ResourceUtils::filterCharacters($array['characters']);
        $array['events'] = ResourceUtils::filterEvents($array['events']);
        $array['series'] = ResourceUtils::filterSeries($array['series']);

        return $array;
    }
}
