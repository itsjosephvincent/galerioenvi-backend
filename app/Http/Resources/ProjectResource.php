<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'thumbnail_url' => $this->thumbnail_url,
            'title' => $this->title,
            'description' => $this->description,
            'location' => $this->location,
            'published_date' => $this->published_date,
            'content' => $this->content,
            'completed_date' => $this->completed_date,
            'created_at' => $this->created_at
        ];
    }
}
