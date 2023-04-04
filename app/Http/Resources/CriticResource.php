<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CriticResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'user'=> $this->user_id->first_name,
            'film' => $this->film_id->title,
            'rating' => $this->score,
            'review' => $this->comment,
        ];
    }
}
