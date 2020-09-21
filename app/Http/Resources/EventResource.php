<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'resourceURI' => 'v1/public/events/' . $this->id,
            'modified' => $this->modified,
            'start' => $this->start_date,
            'end' => $this->end_date,
            'thumbnail' => $this->thumbanil,
            'comics' => $this->comics,
            'stories' => $this->stories,
            'series' => $this->series,
            'characters' => $this->characters
        ];

        $array['comics'] = ResourceUtils::filterComics($array['comics']);
        $array['characters'] = ResourceUtils::filterCharacters($array['characters']);
        $array['series'] = ResourceUtils::filterSeries($array['series']);
        $array['stories'] = ResourceUtils::filterStories($array['stories']);


        return $array;
    }
}
