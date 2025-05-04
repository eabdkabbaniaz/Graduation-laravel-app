<?php

namespace Modules\Mark\Services;

use Modules\Mark\Repository\GradeRepository;
use Exception;
use Illuminate\Support\Facades\Log;
class GradeService
{
    protected GradeRepository $repo;

    public function __construct(GradeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getStudentStats($userId)
    {
        try {
            return $this->repo->getStudentGrades($userId);
        } catch (Exception $e) {
            Log::error('Failed to get student stats: ' . $e->getMessage());
            throw new \RuntimeException('حدث خطأ أثناء جلب بيانات الطالب.');
        }
    }

    public function getAllStudentsGrades()
    {
        try {
            return $this->repo->getAllStudentsGrades();
        } catch (Exception $e) {
            Log::error('Failed to get all student grades: ' . $e->getMessage());
            throw new \RuntimeException('حدث خطأ أثناء جلب علامات الطلاب.');
        }
    }

    public function getCalculationSettings()
    {
        try {
            return $this->repo->getSettings();
        } catch (Exception $e) {
            Log::error('Failed to get settings: ' . $e->getMessage());
            throw new \RuntimeException('حدث خطأ أثناء جلب الإعدادات.');
        }
    }

    public function updateCalculationSettings(array $data)
    {
        try {
            return $this->repo->updateSettings($data);
        } catch (Exception $e) {
            Log::error('Failed to update settings: ' . $e->getMessage());
            throw new \RuntimeException('حدث خطأ أثناء تعديل الإعدادات.');
        }
    }

    public function getStudentDetails($userId)
{
    try {
        // $settings = $this->repo->getSettings();
        return $this->repo->getDetailedStats($userId);
    } catch (\Exception $e) {
        Log::error("تفاصيل الطالب: " . $e->getMessage());
        throw new \RuntimeException("تعذر تحميل تفاصيل التقييم.");
    }
}

}