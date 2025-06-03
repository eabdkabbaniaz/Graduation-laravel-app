<?php

namespace Modules\Experience\Services;

use App\Models\helper;
use Modules\Experience\App\Models\Experience;
use Modules\Experience\App\Models\ExperienceSemester;
use Modules\Experience\App\Models\Session;
use Modules\Experience\App\resources\SessionResource;
use Modules\Experience\Repository\SessionQuestionsRepository;
use Modules\Traits\ApiResponseTrait;
use Exception;

class SessionQuestionsService
{

    public function __construct(protected SessionQuestionsRepository $repo) {}




  public function store(array $message)
{
    try {
        $session_question = $this->repo->create($message);
        return ApiResponseTrait::successResponse("تم الحفظ بنجاح", $session_question);
    } catch (\Throwable $e) {
        return ApiResponseTrait::errorResponse("فشل في الحفظ: " . $e->getMessage());
    }
}



public function update(array $data)
{
    try {
        $session_question = $this->repo->update($data);
        return ApiResponseTrait::successResponse("تم التعديل بنجاح", $session_question);
    } catch (\Throwable $e) {
        return ApiResponseTrait::errorResponse("فشل في التعديل: " . $e->getMessage());
    }
}

    public function destroy($session)
    {
        try {
            $this->repo->delete($session);
            return ApiResponseTrait::successResponse("", "");
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $session_question = $this->repo->find($id);
            return ApiResponseTrait::successResponse("", $session_question);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function index()
    {
        try {
            $session_question = $this->repo->getall();
            return ApiResponseTrait::successResponse("", $session_question);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }

    public function getall()
    {
        try {
            $session_question = $this->repo->getall();
            return ApiResponseTrait::successResponse("", SessionResource::collection($session_question));
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function showSessionQuestion($questionId)
    {
        try {

            $session_question = $this->repo->showSessionQuestion($questionId);
            return ApiResponseTrait::successResponse("", $session_question);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
   
}
