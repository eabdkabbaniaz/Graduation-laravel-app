<?php

namespace Modules\Student\Services;

use Modules\Student\Repository\UserRepositoryInterface;
use Modules\Student\Repository\StudentRepository;;

use Exception;
use Illuminate\Support\Facades\Auth;
use Modules\Student\Repository\ReportRepository;
use Modules\Traits\ApiResponseTrait;
use Modules\Traits\UploadServiceTrait;

class ReportService
{
    protected $user_report_repo;
    public function __construct(ReportRepository $user_report_repo)
    {
        $this->user_report_repo  = $user_report_repo;
    }

    public function index()
    {
        try {
            $message = Auth::user()->id;
            $report_student =  $this->user_report_repo->index($message);
            return ApiResponseTrait::successResponse("", $report_student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function create($message)
    {
        try {
            $path = UploadServiceTrait::uploadFile($message->file('report'), 'reports');
            $data['report'] = $path;
            $data['user_id'] = Auth::user()->id;
            $data['session_id'] = $message['session_id'];
            $data['mark'] = $message['mark'];
            $report_student =  $this->user_report_repo->create($data);
            return ApiResponseTrait::successResponse("تم اضافة التقرير بنجاح  ", $report_student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
    public function show($message)
    {
        try {
            $data['user_id'] = Auth::user()->id;
            $data['session_id'] = $message;
            $report_student =  $this->user_report_repo->show($data);
            if (!$report_student) {
                throw new Exception("التقرير غير موجود");
            }
            return ApiResponseTrait::successResponse("", $report_student);
        } catch (\Throwable $e) {
            return ApiResponseTrait::errorResponse($e->getMessage());
        }
    }
}
