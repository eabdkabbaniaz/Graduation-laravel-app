<?php

namespace Modules\Experience\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'experience_id' => $this->experiences->experience,
            'teacher_id' => $this->teacher,
            'drugs' => DrugResource::collection($this->whenLoaded('drugs')),
            'created_at' => $this->created_at,
            'status' => $this->status,
            'has_attended' => $this->has_attended,
            'mark' => $this->mark,

        ];    }
}
