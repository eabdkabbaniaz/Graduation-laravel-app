<?php

namespace Modules\University\Services;


use Modules\Traits\ApiResponseTrait;
use Exception;
use Modules\University\Repository\SisonRepository;

class SisonService
{
    protected $repo;

    public function __construct(SisonRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        try {
            $sison = $this->repo->index();
            return ApiResponseTrait::successResponse("", $sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $sison = $this->repo->find($id);
            if (!$sison) {
                throw new Exception("الفصل غير موجود");
            }
            return ApiResponseTrait::successResponse("", $sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function create($message)
    {
        try {

            $sison =  $this->repo->create($message);
            return ApiResponseTrait::successResponse("تم  اضافة الفصل  بنجاح", $sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function update($message)
    {
        try {
            $sison = $this->repo->update($message);
            return ApiResponseTrait::successResponse("تم تحديث بيانات الفصل بنجاح", $sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function destroy($message)
    {
        try {
            $sison = $this->repo->destroy($message);
            if (!$sison) {
                throw new Exception("الفصل غير موجود");
            }
            return ApiResponseTrait::successResponse("تم الحذف بنجاح", $sison);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
}
