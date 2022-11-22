<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingTraineesResource extends JsonResource
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
            'date_from' => $this->date_from,
            'date_to' => $this->date_to,
            'location' => $this->location,
            'training_id' => $this->training_id,
            'name' => $this->name,
            'training_certification_id' => $this->training_certification_id,
            'certificate_no' => $this->certificate_no,
            'training_date_from' => $this->training_date_from,
            'training_date_to' => $this->training_date_to
        ];
    }
}
