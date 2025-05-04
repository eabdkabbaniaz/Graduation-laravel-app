<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class GradesExport implements FromCollection, WithHeadings
{
    protected array $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function collection()
    {
        return User::with('students')->get()->map(function ($user) {
            $student = $user->student;
            $row = [];

            foreach ($this->columns as $key => $label) {
                $row[$label] = match ($key) {
                    'name' => $user->name,
                    'final_grade' =>(string) $user->students?->final_grade ?? 0,
                    'assessment_score' =>(string) $user->students?->assessment_score ?? 0,
                    'exam_score' => (string)$user->students?->exam_score ?? 0,
                    'attendance_average' =>(string) $user->students?->attendance_average ?? 0,
                    default => '',
                };
            }

            return $row;
        });
    }

    public function headings(): array
    {
        return array_values($this->columns);
    }
}
