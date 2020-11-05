<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Participant extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
		return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
			'dob' => $this->dob,
			'profession' => $this->profession,
			'locality' => $this->locality,
			'number_of_guests' =>$this->number_of_guests,
			'address' => $this->address,
            //'created_at' => $this->created_at->format('d/m/Y'),
            //'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
