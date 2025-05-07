<?php

namespace Modules\University\Services;


use Modules\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Support\Facades\Auth;
use Modules\University\Repository\StudentExperienceRepository;
use Modules\University\Repository\UniversityExperiencesSisonRepository;

class StudentExperienceService
{
    protected $repo;

    public function __construct(StudentExperienceRepository $repo)
    {
        $this->repo = $repo;
    }


    public function index()
    {
        try {
            $student_exp = $this->repo->index();
            return ApiResponseTrait::successResponse("", $student_exp);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $message['university_id'] = Auth::user()->university_id;
            $message['sisonId']=$id;
            $student_exp = $this->repo->find($message);
            if (!$student_exp) {
                throw new Exception("غير موجود");
            }
            return ApiResponseTrait::successResponse("", $student_exp);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
}
