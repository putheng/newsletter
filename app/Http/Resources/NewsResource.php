<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image->url,
            'slug' => $this->slug,
            'url' => asset('api/v2/news/'. $this->slug),
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
