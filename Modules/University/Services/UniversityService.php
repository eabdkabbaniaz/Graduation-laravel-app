<?php

namespace Modules\University\Services;


use Modules\Traits\ApiResponseTrait;
use Exception;
use Modules\University\Repository\UniversityRepository;

class UniversityService
{
    protected $repo;

    public function __construct(UniversityRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        try {
            $university = $this->repo->index();
            return ApiResponseTrait::successResponse("", $university);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $university = $this->repo->find($id);
            if (!$university) {
                throw new Exception("الجامعة غير موجودة");
            }
            return ApiResponseTrait::successResponse("", $university);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function create($message)
    {
        try {
            
            $university =  $this->repo->create($message);
            return ApiResponseTrait::successResponse("تم  اضافة الجامعة  بنجاح", $university);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function update($message)
    {
        try {
            $university = $this->repo->update($message);
            return ApiResponseTrait::successResponse("تم تحديث بيانات الجامعة بنجاح", $university);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function destroy($message)
    {
        try {
            $university = $this->repo->destroy($message);
            if (!$university) {
                throw new Exception("الجامعة غير موجودة");
            }
            return ApiResponseTrait::successResponse("تم الحذف بنجاح", $university);
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
