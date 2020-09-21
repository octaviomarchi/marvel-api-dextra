<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'modified' => $this->modified,
            'comics' => $this->comics,
            'events' => $this->events,
            'series' => $this->series,
            'stories' => $this->stories
        ];
        $array['comics'] = ResourceUtils::filterComics($array['comics']);
        $array['events'] = ResourceUtils::filterEvents($array['events']);
        $array['series'] = ResourceUtils::filterSeries($array['series']);
        $array['stories'] = ResourceUtils::filterStories($array['stories']);
        return $array;
    }

}
