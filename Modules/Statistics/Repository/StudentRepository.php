<?php
namespace Modules\Statistics\Repository;

use App\Models\User;
use Modules\Exam\App\Models\Exam;
use Modules\Exam\App\Models\ExamSubject;
use Modules\Exam\App\Models\ExamUser;
use Modules\Exam\App\Models\Subject;
use Modules\Student\App\Models\Student;

class StudentRepository
{
    public function findWithRelations($studentId)
    {
        return User::with(['sessions', 'attendances', 'exam'])->where('role','student')->findOrFail($studentId);
    }
}
