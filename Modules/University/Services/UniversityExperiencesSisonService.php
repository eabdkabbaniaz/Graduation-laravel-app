<?php

namespace Modules\University\Services;


use Modules\Traits\ApiResponseTrait;
use Exception;
use Modules\University\Repository\UniversityExperiencesSisonRepository;

class UniversityExperiencesSisonService
{
    protected $repo;

    public function __construct(UniversityExperiencesSisonRepository $repo)
    {
        $this->repo = $repo;
    }


    public function index()
    {
        try {
            $uni_exp_sison = $this->repo->index();
            return ApiResponseTrait::successResponse("", $uni_exp_sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $uni_exp_sison = $this->repo->find($id);
            if (!$uni_exp_sison) {
                throw new Exception("غير موجود");
            }
            return ApiResponseTrait::successResponse("", $uni_exp_sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function create($message)
    {
        try {
            $message['university_id'] = auth('university')->user()->id;
            $uni_exp_sison =  $this->repo->create($message);
            return ApiResponseTrait::successResponse("تم  الاضافة   بنجاح", $uni_exp_sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
 
    public function destroy($message)
    {
        try {
            $uni_exp_sison = $this->repo->destroy($message);
            if (!$uni_exp_sison) {
                throw new Exception(" غير موجود");
            }
            return ApiResponseTrait::successResponse("تم الحذف بنجاح", $uni_exp_sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function changeStatus($message)
    {
        try {
            $university = $this->repo->changeStatus($message);
            if (!$university) {
                throw new Exception("الجامعة غير موجودة");
            }
            return ApiResponseTrait::successResponse("تم تحديث الحالة بنجاح", $university);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
}
