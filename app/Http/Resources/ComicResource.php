<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComicResource extends JsonResource
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
            'id'=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'diamondCode' => $this->diamond_code,
            'ean' => $this->ean,
            'issn' => $this->issn,
            'format' => $this->format,
            'pageCount' => $this->page_count,
            'thumbnail' => $this->thumbnail,
            'characters' => $this->characters,
            'events' => $this->events,
            'series' => $this->series,
            'stories' => $this->stories
        ];

        $array['characters'] = ResourceUtils::filterCharacters($array['characters']);
        $array['events'] = ResourceUtils::filterEvents($array['events']);
        $array['series'] = ResourceUtils::filterSeries($array['series']);
        $array['stories'] = ResourceUtils::filterStories($array['stories']);
        
        return $array;
    }
}
