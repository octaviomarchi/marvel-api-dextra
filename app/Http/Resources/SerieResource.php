<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SerieResource extends JsonResource
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
            'resourceURI' => 'v1/public/series/' . $this->id,
            'startYear'=> $this->start_year,
            'endYear'=> $this->end_year,
            'rating'=> $this->rating,
            'modified' => $this->modified,
            'thumbnail' => $this->thumbnail,
            'comics' => $this->comics,
            'stories' => $this->stories,
            'events' => $this->events,
            'characters' => $this->characters
        ];

        $array['comics'] = ResourceUtils::filterComics($array['comics']);
        $array['characters'] = ResourceUtils::filterCharacters($array['characters']);
        $array['events'] = ResourceUtils::filterEvents($array['events']);
        $array['stories'] = ResourceUtils::filterStories($array['stories']);

        return $array;
    }
}
