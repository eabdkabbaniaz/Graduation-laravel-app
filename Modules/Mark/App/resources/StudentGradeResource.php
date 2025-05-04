<?php

namespace Modules\Mark\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentGradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'user_id' => $this->user_id,
            'user_name' => $this->user->name ?? null,
            'email' => $this->user->email ?? null,
            'exam_score' => $this->exam_score,
            'assessment_score' => $this->assessment_score,
            'attendance_average' => $this->attendance_average,
            'final_grade' => $this->final_grade,
        ];
    }
}
