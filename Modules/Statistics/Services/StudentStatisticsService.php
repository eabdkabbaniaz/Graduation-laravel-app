<?php
namespace Modules\Statistics\Services;

use Modules\Statistics\Repository\StudentRepository;


class StudentStatisticsService
{
    protected $studentRepo;

    public function __construct(StudentRepository $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }

    public function getStatisticsForStudent($studentId)
    {
        $student = $this->studentRepo->findWithRelations($studentId);

        $totalSessions = $student->sessions->count();
        $attendedSessions = $student->attendances->where('status', 'present')->count();
        $attendancePercentage = $totalSessions > 0 ? round(($attendedSessions / $totalSessions) * 100, 2) : 0;

        $examResults = $student->examResults;
        $examStats = $examResults->map(function($result) {
            return [
                'exam_name' => $result->exam->title,
                'score' => $result->score,
                'percentage' => round(($result->score / $result->exam->total_marks) * 100, 2)
            ];
        });

        $averageExamPercentage = $examStats->avg('percentage');

        return [
            'student_name' => $student->name,
            'attendance_days' => $attendedSessions,
            'attendance_percentage' => $attendancePercentage,
            'exams' => $examStats,
            'average_exam_percentage' => round($averageExamPercentage, 2)
        ];
    }
}
