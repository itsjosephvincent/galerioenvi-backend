<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TraineeResource extends JsonResource
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
            'training_certification_id' => $this->training_certification_id,
            'name' => $this->name,
            'certificate_no' => $this->certificate_no,
            'training_date_from' => $this->training_date_from,
            'training_date_to' => $this->training_date_to,
            'created_at' => $this->created_at
        ];
    }
}
