<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Models\Language;
class FilmResourceNoActorsNoCritics extends JsonResource
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
            'title' => $this->title,
            'release year' => $this->release_year,
            'length' => $this->length,
            'description' => $this->description,
            'rating' => $this->rating,
            'language' => $this->language_id,
            //'language' => LanguageResource::collection(),
            'special features' => $this->special_features,
            'image' => $this->image
        ];
    }
}
